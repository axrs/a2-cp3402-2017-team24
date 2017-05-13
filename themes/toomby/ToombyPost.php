<?php

class ToombyPost extends TimberPost
{
    var $_hero_fields = array('hero_subtitle', 'hero_description', 'hero_image');

    /**
     * Checks if the current post has a hero section associated with it
     *
     * @return bool True if the post has a hero section associated with it
     */
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
}
