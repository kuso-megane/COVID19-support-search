<?php

namespace domain\backyardSupportOrgs\edit\Validator;

use domain\backyardSupportOrgs\edit\Data\InputData;
use domain\Exception\ValidationFailException;

class Validator
{
    /**
     * @param array $vars
     * @return InputData
     */
    public function validate(array $vars): InputData
    {
        $id = ($vars['id'] !== NULL) ? (int) $vars['id'] : NULL;

        if (! ($id > 0)) {
            throw new ValidationFailException('想定外のidが渡されています。');
        }

        
    }
}
