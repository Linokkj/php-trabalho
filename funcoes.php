<?php

// Valida texto obrigatório (remove espaços em branco das pontas)
function validarTexto($valor) {
    $valor = trim($valor);
    return !empty($valor);
}

// Valida se é um número inteiro válido e não negativo
function validarInteiro($valor, $min = 0) {
    if (!filter_var($valor, FILTER_VALIDATE_INT) && $valor !== 0 && $valor !== "0") {
        return false;
    }
    return (int)$valor >= $min;
}

// Valida valor monetário / preço
function validarPreco($valor) {
    if (!is_numeric($valor)) return false;
    return (float)$valor >= 0;
}

// Valida se a raridade escolhida faz parte da lista permitida
function validarRaridade($raridade) {
    $opcoesValidas = [
        "Círculo", "Losango", "Estrela simples", "Rara Dupla", 
        "Ilustração Rara", "Ultra-Rara / Full Art", 
        "Ilustração Rara Especial", "Hiper Rara (Gold)", "Rara Secreta (SR)"
    ];
    return in_array($raridade, $opcoesValidas);
}

// Escapa código para evitar vulnerabilidade XSS no HTML
function escape($texto) {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}