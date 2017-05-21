<?php

class ToombyPost extends TimberPost
{
    var $_hero_fields = array('hero_subtitle', 'hero_description', 'hero_image');

    public function hasHero()
    {
        $found = false;
        $f;
        foreach ($this->_hero_fields as $field) {
            $f = $this->get_field($field);

            if (!acf_is_empty($f)) {
                $found = true;
                break;
            }
        }
        return $found;
    }

    function query($args)
    {
        return Timber::get_posts($args);
    }

    public function related($limit = 3, $exclude_self = true)
    {
        $exclude = ($exclude_self) ? array($this->ID) : array();

        $related_query = array(
            'post_type' => $this->post_type,
            'post__not_in' => $exclude,
            'orderby' => 'desc',
            'posts_per_page' => $limit
        );
        return $this->query($related_query);
    }

    public function clinics()
    {
        $query = array(
            'post_type' => 'clinic',
            'orderby' => 'meta_value_num',
            'meta_key' => 'priority',
            'order' => 'asc',
            'limit' => 100,
        );
        return $this->query($query);
    }

    public function sponsors()
    {
        $query = array(
            'post_type' => 'sponsor',
            'orderby' => 'meta_value_num',
            'meta_key' => 'priority',
            'order' => 'asc',
            'limit' => 100,
        );
        return $this->query($query);
    }

    public function staff($limit, $exclude_self = true)
    {
        $exclude = ($exclude_self) ? array($this->ID) : array();

        $staff_query = array(
            'post_type' => 'staff',
            'orderby' => 'rand',
            'limit' => $limit,
            'post__not_in' => $exclude
        );
        return $this->query($staff_query);
    }

    public function allStaff()
    {
        return $this->staff(100);
    }

    public function articles($limit = 3, $exclude_self = false)
    {
        $exclude = ($exclude_self) ? array($this->ID) : array();

        $article_query = array(
            'post_type' => 'post',
            'orderby' => 'desc',
            'limit' => $limit,
            'post__not_in' => $exclude
        );
        return $this->query($article_query);
    }
}
