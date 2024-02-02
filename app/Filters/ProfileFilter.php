<?php
namespace App\Filters;
use App\Filters\ApiFilter;

class ProfileFilter extends ApiFilter {
  protected $safeParams = [
    'id' => ['eq'],
    'userId' => ['eq'],
    'name' => ['eq'],
    'email' => ['eq'],
    'profileImg' => ['eq'],
    'description' => ['eq']
  ];
  protected $columnMap = [
    'userId' => 'user_id',
    'profileImg' => 'profile_img'
  ];
  protected $operatorMap = [
    'eq' => '='
  ];

}