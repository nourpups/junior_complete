<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class NotSamePassword implements  DataAwareRule, ValidationRule
{

   /**
    * Run the validation rule.
    *
    * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
    */

   protected string $newPassword;

   public function validate(string $attribute, mixed $value, Closure $fail): void
   {
      if ($value === $this->newPassword) {
         $fail('New password cannot be same as your current password');
      }
   }

   public function setData(array $data): static
   {
      $this->newPassword = $data['new_password'];

      return $this;
    }

}
