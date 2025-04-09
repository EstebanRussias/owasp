<?php 

require_once('./models/connection.php');

// CREATE
function createBook($isbn, $title, $summary, $publication_year): bool {
    $sql = "INSERT INTO book(isbn, title, summary, publication_year, issue_date, updated_at) 
            VALUES (:isbn, :title, :summary, :publication_year, :issue_date, :updated_at)";

    $dt = time();
    $issue_date = date("Y-m-d", $dt); // Date sans l'heure
    $updated_at = date("Y-m-d H:i:s", $dt); // Date avec heure
    $query = dbConnect()->prepare($sql);
    $query->bindParam(':isbn', $isbn, PDO::PARAM_INT);
    $query->bindParam(':title', $title, PDO::PARAM_STR);
    $query->bindParam(':summary', $summary, PDO::PARAM_STR);
    $query->bindParam(':publication_year', $publication_year, PDO::PARAM_INT);
    $query->bindParam(':issue_date', $issue_date, PDO::PARAM_STR);
    $query->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
    return $query->execute();
}


function createIllustration($description , $filename , $isCover, $id_book): bool {
    $sql = "INSERT INTO illustration(description,filename,isCover,id_book) VALUES (:description,:filename,:isCover,:id_book)";
    $query = dbConnect()->prepare($sql);
    $query->bindParam(':description', $description, PDO::PARAM_STR);
    $query->bindParam(':filename', $filename, PDO::PARAM_STR);
    $isCover = intval($isCover);
    $query->bindParam(':isCover', $isCover, PDO::PARAM_INT);
    $query->bindParam(':id_book', $id_book, PDO::PARAM_INT);
    return $query->execute();
}

function createUser($first_name, $last_name, $birth_date , $email , $password ): bool {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $dt = time();
    $created_at = date("Y-m-d H:i:s", $dt); // Date avec heure
    $updated_at = date("Y-m-d H:i:s", $dt); // Date avec heure
    $sql = "INSERT INTO user(first_name, last_name, birth_date, email, password,created_at, updated_at ,id_role) VALUES (:first_name, :last_name, :birth_date, :email, :password,:created_at, :updated_at , :id_role)";
    $query = dbConnect()->prepare($sql);
    $query->bindParam(':first_name', $first_name, PDO::PARAM_STR);
    $query->bindParam(':last_name', $last_name, PDO::PARAM_STR);
    $query->bindParam(':birth_date', $birth_date, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':created_at', $created_at, PDO::PARAM_STR);
    $query->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);  
    $query->bindValue(':id_role', 2, PDO::PARAM_INT);
    return $query->execute();
}


// READ

// Lasts
function getLastBooks(int $limit): array {
    $sql = "SELECT isbn, title, summary, publication_year FROM book ORDER BY publication_year DESC LIMIT :limit";
    $query = dbConnect()->prepare($sql);
    $query->bindParam(':limit', $limit, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll();
}

//All 
function getAllBooks(): array {
    $sql = "SELECT id, isbn, title, summary, publication_year FROM book ORDER BY id DESC";
    $query = dbConnect()->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}

// Illustration by id_book 
function getAllInformationBook(): array {
    $sql = "SELECT b.id AS book_id,b.isbn,b.title,b.summary,b.publication_year,b.issue_date,b.updated_at,i.id AS illustration_id,i.description,i.filename,i.isCover FROM book b 
    LEFT JOIN illustration i ON b.id = i.id_book;";
    $query = dbConnect()->prepare($sql);
    $query->execute();
    return $query->fetchAll();
}

function getInformationUser($email): array {
    $sql = "SELECT u.id AS user_id,u.first_name,u.last_name,u.birth_date,u.email,u.created_at,u.updated_at,r.id AS role_id,r.name AS role_name FROM user u 
    LEFT JOIN role r ON u.id_role = r.id WHERE u.email = :email;";
    $query = dbConnect()->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    return $query->fetch();
}

// One
function getBook(int $id): mixed {
    $sql = "SELECT id,isbn, title, summary, publication_year FROM book WHERE id = :id";
    $query = dbConnect()->prepare($sql);
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();
}

function getUserByMail($email): mixed {
    $sql = "SELECT * FROM user WHERE email = :email";
    $query = dbConnect()->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    return $query->fetch();
}

// UPDATE
function updateBook($isbn, $title, $summary, $publication_year, $id): bool {
    $sql = "UPDATE book 
            SET isbn = :isbn, title = :title, summary = :summary, publication_year = :publication_year , updated_at = :updated_at 
            WHERE id = :id";
    $dt = time();
    $updated_at = date("Y-m-d H:i:s", $dt); // Date avec heure
    $query = dbConnect()->prepare($sql);
    $query->bindParam(':isbn', $isbn, PDO::PARAM_INT);
    $query->bindParam(':title', $title, PDO::PARAM_STR);
    $query->bindParam(':summary', $summary, PDO::PARAM_STR);
    $query->bindParam(':publication_year', $publication_year, PDO::PARAM_INT);
    $query->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
    $query->bindParam(':id', $id, PDO::PARAM_INT); // Ajout de cette ligne
    return $query->execute();
}


// DELETE
function deleteBook(int $id): bool {
    $sql = "DELETE FROM book WHERE id = :id";
    $query = dbConnect()->prepare($sql);
    $query->bindParam(":id", $id, PDO::PARAM_INT);
    return $query->execute();
}

function deleteAllUsers(): bool {
    $sql = "DELETE FROM user";
    $query = dbConnect()->prepare($sql);
    return $query->execute();
}



// TEST 

function userExist($email): bool {
    $sql = "SELECT COUNT(*) FROM user WHERE email = :email";
    $query = dbConnect()->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    return $query->fetchColumn() > 0;
}