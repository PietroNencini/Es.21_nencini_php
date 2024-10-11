<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercizio 21</title>

    <link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>
    <?php
        const NUM_STUDENTS = 3;
        const NUM_VOTI = 3;
        $studentNames = ["Pietro", "Tommaso", "Niccolò"];
        $studentSurnames = ["Nencini", "Parigi", "Mancini"];
        function createVoteList(): array {
            $list = [];
            for ($i = 0; $i < NUM_VOTI; $i++) {
                $list[$i] = rand(2, 10);
            }
            return $list;
        }
        function createStudent($names, $surnames): array {
            return array("name" => $names[rand(0, count($names)-1 )],
                        "surname" => $surnames[rand(0, count($surnames)-1 )],
                        "voteList" => createVoteList());
        }
    ?>
    <?php
        $students = [];
        for ($i = 0; $i < NUM_STUDENTS; $i++) {
            $students[$i] = createStudent($studentNames, $studentSurnames);
        }
        foreach($students as $stud) {
            $output = "<h2> ".$stud["name"]." ".$stud["surname"]." </h2> <ul> Lista Voti:";
            for($i = 0; $i < count($stud["voteList"]); $i++) {
                $output .= "<li>".$stud["voteList"][$i]."</li>";
            }
            echo $output .= "</ul>";
        }

        $output_table = "<table>
                        <tr> <th> Nome Studente </th>
                        <th> Cognome Studente </th>
                        <th> Media Voti </th>
                        <th> VotoMassimo </th> </tr>";
        for($i = 0; $i < count($students); $i++) {
            $output_table .= "<tr> <td> ".$students[$i]["name"]."</td>";
            $output_table .= "<td> ".$students[$i]["surname"]."</td>";
            $output_table .= "<td> ".number_format(array_sum($students[$i]["voteList"])/NUM_VOTI, 2)."</td>";
            $output_table .= "<td> ".max($students[$i]["voteList"])."</td> </tr>";
        }
        echo $output_table .= "</table>";
    ?>
</body>
</html>