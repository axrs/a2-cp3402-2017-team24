<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/views/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

include_once("ToombyPost.php");

$context = Timber::get_context();
$post = new ToombyPost();
$context['post'] = $post;

$contact_form = array();
$missing_content = "Please fill out all fields below.";
$email_invalid = "The email address is invalid.";
$message_unsent = "Message was not sent. Try Again.";
$message_sent = "Thank You! Your message has been sent.";

function toomby_contact_form($type, $message)
{
    global $contact_form;
    $contact_form['type'] = $type;
    $contact_form['message'] = $message;
}

//The contact form has been submitted
if (isset($_POST['submitted'])) {
    // Refer https://webdevdoor.com/wordpress/submitting-form-wordpress-redirects-404-page
    $name = $_POST['message_name'];
    $email = $_POST['message_email'];
    $phone = $_POST['message_phone'];
    $city = $_POST['message_city'];
    $message = $_POST['message_message'];

    $to = get_option('admin_email');
    $subject = "Someone sent a message from " . get_bloginfo('name');
    $headers = 'From: ' . $email . "\r\n" . 'Reply-To: ' . $email . "\r\n";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        toomby_contact_form("error", $email_invalid);
    } else {
        if (empty($name) || empty($message)) {
            toomby_contact_form("error", $missing_content);
        } else {
            $sent = wp_mail($to, $subject, strip_tags($message), $headers);
            if ($sent) {
                toomby_contact_form("success", $message_sent);
            } else {
                toomby_contact_form("error", $message_unsent);
            }
        }
    }
    //Expose the contact form results as part of the context
    $context['contact'] = $contact_form;
}

Timber::render(array('page-' . $post->post_name . '.twig', 'page.twig'), $context);
