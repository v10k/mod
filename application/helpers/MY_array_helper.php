<?php

/**
 * Recebe um vetor associativo e coloca aspas simples nos
 * seus valores para que possam ser inseridos no c�digo sql
 *
 * @param array $v
 * @return $v com aspas simples
 */
function plic_array(array $v) {
	$x = array();
	foreach ($v as $key => $val) {
		$x[$key] = "'$val'";
	}
	return $x;
}