<?php

// Описание
// На сайте интернет-магазина имя пользователя в разных компонентах отображается по-разному. Для этого запросите фамилию, имя, отчество и напишите стандартизатор имён.

// Техническое задание
// В личном кабинете отображается фамилия и инициалы, поэтому вам необходимо из фамилии, имени и отчества получить надпись следующего формата: Фамилия И.О.. На компоненте корзины отображаются только первые буквы ФИО. При отправке заказа нужно указывать полные фамилию, имя и отчество, при этом первая буква должна быть в верхнем регистре. Программа должна корректно работать с кириллицей.

// Пример
// Пользователь ввёл следующие данные:

// Имя: иван
// Фамилия: иванов
// Отчество: иванович
// У вас должны получиться следующие переменные:
// $fullName = 'Иванов Иван Иванович'
// $fio = 'ИИИ'
// $surnameAndInitials = 'Иванов И.И.'
// Их необходимо вывести на экран в следующем формате:

// Полное имя: 'Иванов Иван Иванович'
// Фамилия и инициалы: 'Иванов И.И.'
// Аббревиатура: 'ИИИ' \

// Алгоритм выполнения
// Создать файл index.php.
// Запросить три переменные с именем, фамилией и отчеством.
// Объявить переменную $fullname, записать в неё полное ФИО так, чтобы каждое слово начиналось с большой буквы.
// Объявить переменную $surnameAndInitials. Её значением должна быть конкатенация фамилии с первой буквой в верхнем регистре, а также через пробел — инициалов. После каждой буквы инициалов должна быть точка.
// Объявить переменную $fio. Значением должна быть конкатенация первых букв в верхнем регистре.



$pattern = '/\b\p{Cyrillic}+\b/u';


// echo 'Имя: ';
// $firstName = trim(fgets(STDIN));
// echo PHP_EOL;

// if (!preg_match($pattern, $firstName, $matches)) {
//     fwrite(STDERR, '... не похоже на имя' . PHP_EOL);
//     exit(1);
// }

// echo 'Отчество: ';
// $middleName = trim(fgets(STDIN));
// echo PHP_EOL;

// if (!preg_match($pattern, $middleName, $matches)) {
//     fwrite(STDERR, '... не похоже на отчество' . PHP_EOL);
//     exit(1);
// }

// echo 'Фамилия: ';
// $lastName = trim(fgets(STDIN));
// echo PHP_EOL;

// if (!preg_match($pattern, $lastName, $matches)) {
//     fwrite(STDERR, '... не похоже на фамилию' . PHP_EOL);
//     exit(1);
// }

// $firstName = mb_strtoupper(mb_substr($firstName, 0, 1)) . mb_strtolower(mb_substr($firstName, 1));
// $middleName = mb_strtoupper(mb_substr($middleName, 0, 1)) . mb_strtolower(mb_substr($middleName, 1));
// $lastName = mb_strtoupper(mb_substr($lastName, 0, 1)) . mb_strtolower(mb_substr($lastName, 1));
// fwrite(STDOUT, $firstName . PHP_EOL);
// fwrite(STDOUT, $middleName . PHP_EOL);
// fwrite(STDOUT, $lastName . PHP_EOL);

// $fullname = $lastName . ' ' . $firstName . ' ' . $middleName;
// $surnameAndInitials = $lastName . ' ' . mb_substr($firstName, 0, 1) . '. ' . mb_substr($middleName, 0, 1) . '.';
// $fio = mb_substr($lastName, 0, 1) . mb_substr($firstName, 0, 1) . mb_substr($middleName, 0, 1);

$fioArray = [
    'Имя' => 'имя',
    'Отчество' => 'отчество',
    'Фамилия' => 'фамилию',
];

foreach($fioArray as $key => $value) {
    echo $key . ': ';
    $tmp = trim(fgets(STDIN));

    if (!preg_match($pattern, $tmp, $matches)) {
        fwrite(STDERR, 'Ошибка: "' . $tmp .'" не похоже на ' . $value . PHP_EOL);
        exit(1);
    } else {
        $fioArray[$key] =  mb_strtoupper(mb_substr($tmp, 0, 1)) . mb_strtolower(mb_substr($tmp, 1));
    }
}

//print_r($fioArray);


$fullname = $fioArray['Фамилия'] . ' ' . $fioArray['Имя'] . ' ' . $fioArray['Отчество'];
$surnameAndInitials = $fioArray['Фамилия'] . ' ' . mb_substr($fioArray['Имя'], 0, 1) . '. ' . mb_substr($fioArray['Отчество'], 0, 1) . '.';
$fio = mb_substr($fioArray['Фамилия'], 0, 1) . mb_substr($fioArray['Имя'], 0, 1) . mb_substr($fioArray['Отчество'], 0, 1);


fwrite(STDOUT, 'Полное имя: ' . $fullname . PHP_EOL);
fwrite(STDOUT, 'Фамилия И. О.: ' . $surnameAndInitials . PHP_EOL);
fwrite(STDOUT, 'ФИО: ' . $fio . PHP_EOL);


?>