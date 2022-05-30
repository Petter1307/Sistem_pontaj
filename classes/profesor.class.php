<?php
class profesor extends User
{
    public function getStudentList($_an, $_grupa, $_spec)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM lista_studenti WHERE  specializare= ? and an=? and grupa=?;');
        if (!$stmt->execute(array($_spec, $_an, $_grupa))) {
            $error = 'GetStudentListStmtFailed';
            $_SESSION['error'] = $error;
            $_SESSION['view'] = 0;
            header('location:../pages/prezenti.php');
            exit();
        }
    }
}
