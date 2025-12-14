<?php
if (!function_exists('sipkbForm')) {
   function sipkbForm(array $fields): array
    {
        $result = [];

        foreach ($fields as $field) {
            $page    = $field['page'] ?? 1;          // default page
            $section = $field['section'] ?? 'default';
            $group   = $field['group'] ?? 0;         // default group

            // init page
            if (!isset($result[$page])) {
                $result[$page] = [];
            }

            // init section
            if (!isset($result[$page][$section])) {
                $result[$page][$section] = [];
            }

            // init group
            if (!isset($result[$page][$section][$group])) {
                $result[$page][$section][$group] = [];
            }

            $result[$page][$section][$group][] = $field;
        }

        return $result;
    }

}
