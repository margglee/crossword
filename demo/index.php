<?php
//type php -S localhost:8080 into terminal to start a local server
//http://localhost:8080/index.php 
//Random is weird, does not always use all the words
//include './generate.php';
require_once './autoloader.php';

//$words = ['hello', 'on', 'hi'];

//$crossword = new \Crossword\Crossword(2, 5, $words);
//$isGenerated = $crossword->generate(\Crossword\Generate\Generate::TYPE_BASE_LINE_COLUMN);
$words = array(
    'leaders' => [
        'number' => 1,
        'definition' => 'UMICH: __ and the best',
    ],
    'apple' => [
        'number' => 2,
        'definition' => 'An __ a day keeps the doctor away',
    ],
    'strawberry' => [
        'number' => 3,
        'definition' => 'Red fruit that is covered in tiny seeds',
    ],
);

// Create new crossword
$crossword = new \Crossword\Crossword(10, 10, $words);
$crossword->generate(\Crossword\Generate\Generate::TYPE_BASE_LINE_COLUMN, true);

print_r($crossword->toArray());
echo "<br>";
//prints the crossword in a crossword like format
foreach ($crossword->getRows() as $rowIndex => $row) {
    foreach ($row->getFields() as $fieldIndex => $field) {
        if (!$field->getChar()) {
            echo "+";
            continue;
        }

        $array[$rowIndex][$fieldIndex] = $field->getChar();
        echo $field->getChar();
    }
    echo "<br>"; //add newline in html
}
echo "<br>";
foreach ($crossword->getWords() as $word) {
    echo $word->getParams()['number'].": ";
    print_r($word->getParams()['definition']);
    echo "<br>";
}
echo "<br>";
//file_put_contents(__DIR__ . '/crossword.json', json_encode($crossword->toArray(), JSON_PRETTY_PRINT));
echo json_encode($crossword->toArray(), JSON_PRETTY_PRINT);


// List of words for crossword generation
//$words = ['ubuntu', 'bower', 'seed', 'need'];
//$crossword = new \Crossword\Crossword(9, 9, $words);
//$isGenerated = $crossword->generate(\Crossword\Generate\Generate::TYPE_RANDOM);

//print_r($crossword->toArray());
?>