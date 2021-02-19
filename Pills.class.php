<?php

//1-4. 
class pills
{
    public $title;
    public $price;
    public $category;
    public $article;

    function __construct($title, $price, $category, $article)
    {
        $this->title = $title;
        $this->price = $price;
        $this->category = $category;
        $this->article = $article;
    }

    function show()
    {
        echo $this->title . " стоит " . $this->price . " артикул " . $this->article . " категория " . $this->category . "<hr>";
    }
}

$pills1 = new Pills("Персен", 227, "Снотворное", 00001);
$pills2 = new Pills("Гастенорм", 188, "Ферменты", 00002);
$pills3 = new Pills("Анальгин", 88, "Анальгетики", 00003);

//5. 
// Переменная $x сохраняется при каждом вызове и прибавляется единица так как метод пренадлежит классу, а не объекту.
// class A {                        
//     public function foo() {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// $a1 = new A();
// $a2 = new A();
// $a1->foo();  0+1
// $a2->foo();  1+1
// $a1->foo();  2+1
// $a2->foo();  3+1

//6.
// Расширяем класс A добавляя класс B, увеличение переменной $x происходит для каждого класса отдельно.
// class A {
//     public function foo() {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// class B extends A {
// }
// $a1 = new A();
// $b1 = new B();
// $a1->foo();  0+1
// $b1->foo();  0+1
// $a1->foo();  1+1
// $b1->foo();  1+1

