<?php
$data = '[
    {
        "title": "The Catcher in the Rye",
        "author": "J.D. Salinger",
        "publication_year": 1951,
        "category": "Fiction"
    },
    {
        "title": "To Kill a Mockingbird",
        "author": "Harper Lee",
        "publication_year": 1960,
        "category": "Fiction"
    },
    {
        "title": "1984",
        "author": "George Orwell",
        "publication_year": 1949,
        "category": "Dystopian"
    },
    {
        "title": "The Great Gatsby",
        "author": "F. Scott Fitzgerald",
        "publication_year": 1925,
        "category": "Fiction"
    },
    {
        "title": "Brave New World",
        "author": "Aldous Huxley",
        "publication_year": 1932,
        "category": "Dystopian"
    }
]
';
$array = json_decode($data, true);
$categoryArray["Dystopian"] = [];
$categoryArray["Fiction"] = [];
foreach ($array as $book){
    if($book["category"] == "Dystopian"){
        $categoryArray["Dystopian"][] = $book;
    }else{
        $categoryArray["Fiction"][] = $book;
    }
}
?>

<table border="1">
    <tr>
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Publication Year</th>
    </tr>
    <?php foreach ($categoryArray as $category => $books) { ?>
        <tr><td colspan="4" style="text-align:center; font-weight:bold;"><?php echo $category; ?></td></tr>
        <?php foreach ($books as $book) { ?>
            <tr>
            <td><?php echo $book['title']; ?></td>
            <td><?php echo $book['author']; ?></td>
            <td><?php echo $book['publication_year']; ?></td>
            </tr>
        <?php } ?>
    <?php } ?>
</table>