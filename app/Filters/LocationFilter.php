<?php
namespace App\Filters;
use App\Filters\ApiFilter;

class LocationFilter extends ApiFilter {
  protected $safeParams = [
    'id' => ['eq'],
    'userId' => ['eq'],
    'title' => ['eq'],
    'locationType' => ['eq'],
    'services' => ['eq'],
    'price' => ['eq', 'gt', 'lt'],
    'score' => ['eq', 'gt', 'lt'],

  ];
  protected $columnMap = [
    'userId' => 'user_id',
    'locationType' => 'location_type'
  ];
  protected $operatorMap = [
    'eq' => '=',
    'lt' => '<',
    'lte' => '<=',
    'gt' => '>',
    'gte' => '>='
  ];
}
