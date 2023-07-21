<?php

namespace App\Enums;

enum SongStatusEnum:string{
	case DRAFT 		= 'draft';
	case APPROVED 	= 'approved';
	case UNAPPROVED = 'unapproved';
}