<?php

namespace App\Enums;

enum UserRoleEnum:string{
	case USER 			= 'user';
	case AGGREGATOR 	= 'aggregator';
	case APPROVAL 		= 'approval';
	case ACCOUNTANT 	= 'accountant';
	case PROMOTION 	= 'promotion';
  case SUPERADMIN 	= 'superadmin';
	case PLANNER 		= 'planner';
}