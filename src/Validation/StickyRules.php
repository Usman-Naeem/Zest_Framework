<?php

/**
 * This file is part of the Zest Framework.
 *
 * @author Muhammad Umer Farooq (Malik) <mumerfarooqlablnet01@gmail.com>
 *
 * @link https://lablnet.github.io/profile/
 *
 * For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 * @license MIT
 */

namespace Zest\Validation;

class StickyRules
{
    /**
     * Evaulate required.
     *
     * @param $value Value to be checked
     *
     * @return bool
     */
    public function notBeEmpty($value)
    {
        return (!empty($this->removeSpaces($value))) ? true : false;
    }

    /**
     * Remove spaces.
     *
     * @param $value Value to be checked
     *
     * @return value
     */
    public function removeSpaces($value)
    {
        return escape($value);
    }
}
