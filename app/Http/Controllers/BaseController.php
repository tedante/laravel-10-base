<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Validator;
use App\Traits\ResponseFormatter;

class BaseController extends Controller
{
  use ResponseFormatter;

  /**
   * The model instance.
   */
  protected $model;
}
