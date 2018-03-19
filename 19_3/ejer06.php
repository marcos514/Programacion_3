<?php
 $operador='-';
 $op1=10;
 $op2=18;
 switch ($operador) {
 	case '+':
 		echo ($op1+$op2);
 		break;
 		case '-':
 		echo ($op1-$op2);
 		break;
 		case '/':
 		echo ($op1/$op2);
 		break;
 		case '*':
 		echo ($op1*$op2);
 		break;
 	
 	default:
 		echo "error gato";
 		break;
 }
 
?>