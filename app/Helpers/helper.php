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

if (!function_exists('getForm')) {
   function getForm($type, $form_type, $keyword){
        $config = config('siopkb.form_type.'.$type);

        $formulir = null;
        foreach ($config as $value) {
            if($value['code'] == $form_type){
                $formulir = $value;
            }
        }

        if($formulir['fields']){
            $fields = $formulir['fields'];
            foreach ($fields as $fkey => $field) {
                if($field['name'] == $keyword){
                    return $field;
                }
            }
        }

        return null;
    
   }

}
