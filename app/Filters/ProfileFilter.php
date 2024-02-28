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
    'description' => ['eq'],
    'website' => ['eq'],
    'facebook' => ['eq'],
    'instagram' => ['eq'],
    'twitter' => ['eq'],
    'youtube' => ['eq']
  ];
  protected $columnMap = [
    'userId' => 'user_id',
    'profileImg' => 'profile_img'
  ];
  protected $operatorMap = [
    'eq' => '='
  ];

}