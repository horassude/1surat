<?php

$input = [
    'office' => [
        'book' => [
            'qty' => 5,
            'price' => 1500
        ],
        'pen' =>  [
            'qty' => 3,
            'price' => 2500
        ],
        'pencil' => [
            'qty' => 6,
            'price' => 2500
        ]
    ],
    'home' => [
        'sabun' => [
            'qty' => 2,
            'price' => 2500
        ],
        'sapu' => [
            'qty' => 4,
            'price' => 2500
        ],
        'setrika' => [
            'qty' => 2,
            'price' => 2500
        ]
    ],
    'garden' => [
        'cangkul' => [
            'qty' => 6,
            'price' => 2500
        ],
        'sekop' => [
            'qty' => 6,
            'price' => 2500
        ],
        'gunting' => [
            'qty' => 6,
            'price' => 2500
        ]
    ]
];

$x = 0;
$total = [];
$i = 0;

// foreach ($input as $sub1 => $sub1_item) {
//     echo "$sub1:</br>";
//     foreach ($sub1_item as $sub2 => $sub2_item) {
//         if (is_array($sub2_item)) {
//             echo "  $sub2";
//             foreach ($sub2_item as $sub3 => $sub3_item) {

//                 echo "$sub3_item";
//                 $tot[$x] = $sub3_item;
//                 $x++;
//             }
//             $t = $tot[0] * $tot[1];
//             echo $t;
//             $x = 0;
//         } else {
//             echo "  Item: $sub2</br>";
//             echo "    Quantity: $sub2_item";
//         }
//         echo "</br>";
//     }
//     echo "</br></br>";
// }
// ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>HTML Table Example</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Sample HTML Table</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Describtion</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($input as $sub1 => $sub1_item) : ?>
            <td>I</td>
            <th><?= $sub1 ?></th>
            <?php foreach ($sub1_item as $sub2 => $sub2_item) : ?>
                <tr>
                    <? if (is_array($sub2_item)) : ?>
                        <td>-</td>
                        <td><?= $sub2 ?></td>
                        <?php foreach ($sub2_item as $sub3 => $sub3_item) : ?>
                            <td><?= $sub3_item ?></td>
                            <?php $tot[$x] = $sub3_item;  $x++; ?>
                        <?php endforeach ?>
                        <?php  $total = $tot[0] * $tot[1] ?>
                        <td><?= $total ?></td>
                    <?php else : ?>
                        <td><?= $sub2 ?></td>
                        <td><?= $sub2_item ?></td>
                    <? endif ?>
                </tr>
            <?php endforeach ?>
        <? endforeach ?>
        </tbody>
    </table>
</body>

</html> 