<?php
/* 
 * Стандартный словарь Форт-машины, инициализация
 */
namespace FORTH\SYSTEM;

class StandardDictionary {
        /**
         * Инициализация стандартного словаря
         */
        public static function init() {
                $dict = Dictionary::getInstance();
                /*
                 * Печать верхнего числа со стека
                 */
                $dict->addWord(new Word('.',1,1,
                                function ($a) {
                                        echo $a;
                                        return null;
                                }));
                /*
                 * Печать верхнего числа со стека
                 */
                $dict->addWord(new Word('.S',0,0,function () {
                                        $s = Stack::getInstance();
                                        $s = $s->getStack();
                                        foreach($s as $e){
                                            echo $e.' ';
                                        }
                                        return null;
                                }));                        
                /*
                 * Перенос строки
                 */
                $dict->addWord(new Word('CR',0,0,function () {
                                        print(PHP_EOL);
                                        return null;
                                }));                        
                /*
                 * Дубль верхнего числа со стека
                 */
                $dict->addWord(new Word('DUP',1,1,function ($a) {
                                        return array($a, $a);
                                }));
                /*
                 * Обмен двух верхних чисел со стека
                 */
                $dict->addWord(new Word('SWAP',2,2,function ($a, $b) {
                                        return array($a, $b);
                                }));
                /*
                 * Сложение двух верхних чисел, помещение результата на стек
                 */
                $dict->addWord(new Word('+',2,2,function ($a, $b) {
                                        return (array) ($b+$a);
                                }));
                /*
                 * Вычитание двух верхних чисел, помещение результата на стек
                 */
                $dict->addWord(new Word('-',2,2,function ($a, $b) {
                                        return (array) ($b-$a);
                                }));
                /*
                 * Умножение двух верхних чисел, помещение результата на стек
                 */
                $dict->addWord(new Word('*',2,2,function ($a, $b) {
                                        return (array) ($b*$a);
                                }));
                /*
                 * Целочисленное деление двух верхних чисел, помещение результата на стек
                 */
                $dict->addWord(new Word('/',2,2,function ($a, $b) {
                                        return (array) (intval(floor($b/$a)));
                                }));
                //Печатает указанное количество пробелов
                $dict->addWord(new Word('SPACES',1,1,function ($a) {
                                        echo str_repeat(' ', $a);
                                        return null;
                                })); 
                //Печатает пробел
                $dict->addWord(new Word('SPACE',0,0,function () {
                                        echo ' ';
                                        return null;
                                }));                                 
                //Печатает символ по его коду
                $dict->addWord(new Word('EMIT',1,1,function ($a) {
                                        echo chr($a);
                                        return null;
                                })); 
                //Копирует второй по очередности элемент стека на его вершину.
                $dict->addWord(new Word('OVER',2,2,function ($a, $b) {
                                        return array($a, $b, $a);
                                })); 
                $dict->addWord(new Word('ROT',3,3,function ($a, $b, $c) {
                        return array($b, $a, $c);
                                })); 
                $dict->addWord(new Word('DROP',1,1,function ($a) {
                        return null;
                                }));                                
        }
}