<?php
/**
 * The Template for displaying all single posts
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

$course_form = array();
$missing_content = "Please fill out all fields below.";
$email_invalid = "The email address is invalid.";
$message_unsent = "We were unable to process your request. Please try again.";
$message_sent = "Thank You! Your request has been sent.";

function toomby_clinic_form($type, $message)
{
    global $course_form;
    $course_form['type'] = $type;
    $course_form['message'] = $message;
}

//The contact form has been submitted
if (isset($_POST['submitted'])) {
    // Refer https://webdevdoor.com/wordpress/submitting-form-wordpress-redirects-404-page
    $clinic_participation = $_POST['clinic_participation'];
    $clinic_course = $_POST['clinic_course'];
    $clinic_name = $_POST['clinic_name'];
    $clinic_email = $_POST['clinic_email'];
    $clinic_phone = $_POST['clinic_phone'];

    $to = get_option('admin_email');
    $subject = get_bloginfo('name') . ": Someone wishes to register for a course (" . $clinic_course . ")";
    $headers = 'From: ' . $clinic_email . "\r\n" . 'Reply-To: ' . $clinic_email . "\r\n";

    $message = "Name: $clinic_name\nEmail: $clinic_email\nPhone: $clinic_phone\nCourse: $clinic_course ($clinic_participation)";

    if (!filter_var($clinic_email, FILTER_VALIDATE_EMAIL)) {
        toomby_clinic_form("error", $email_invalid);
    } else {
        if (empty($name) || empty($message)) {
            toomby_clinic_form("error", $missing_content);
        } else {
            $sent = wp_mail($to, $subject, strip_tags($message), $headers);
            if ($sent) {
                toomby_clinic_form("success", $message_sent);
            } else {
                toomby_clinic_form("error", $message_unsent);
            }
        }
    }
    //Expose the contact form results as part of the context
    $context['course_form'] = $course_form;
}


if (post_password_required($post->ID)) {
    Timber::render('single-password.twig', $context);
} else {
    Timber::render(array('single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig'), $context);
}
