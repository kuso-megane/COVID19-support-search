<?php

namespace domain\backyardSupportOrgs\edit\Validator;

use domain\backyardSupportOrgs\edit\Data\InputData;
use domain\Exception\ValidationFailException;
use TypeError;

class Validator
{
    /**
     * @param array $vars
     * @return InputData
     */
    public function validate(array $vars): InputData
    {
        $id = ($vars['support_id'] !== NULL) ? (int) $vars['support_id'] : NULL;

        if (! ($id > 0)) {
            throw new ValidationFailException('想定外のidが渡されています。');
        }

        try {
            return new InputData($id);
        }
        catch (TypeError $e) {
            throw new ValidationFailException('想定外のパラメータが渡されています。');
        }
        
    }
}
