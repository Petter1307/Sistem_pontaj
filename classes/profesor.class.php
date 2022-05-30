<?php

class profesor extends User
{
    public function getStudentList($_an, $_grupa, $_spec)
    {
        if ($_grupa == 1) {
            $stmt = $this->connect()->prepare('SELECT * FROM lista_studenti WHERE  id_specializare= ? and an=?;');
            if (!$stmt->execute(array($_spec, $_an))) {
                $error = 'GetStudentListAllStmtFailed';
                $_SESSION['error'] = $error;
                header('location:../pages/prezenti.php?error=GetStudentListAllStmtFailed');
                exit();
            }
        } else {
            $stmt = $this->connect()->prepare('SELECT * FROM lista_studenti WHERE  id_specializare= ? and an=? and grupa=?;');
            if (!$stmt->execute(array($_spec, $_an, $_grupa))) {
                $error = 'GetStudentListStmtFailed';
                $_SESSION['error'] = $error;
                header('location:../pages/prezenti.php?error=GetStudentListStmtFailed');
                exit();
            }
        }
        if ($stmt->rowCount() == 0) {
            echo "No students found!" . "</br>";
            exit(); // TODO Test this exit shiz
        }
        $results = $stmt->fetchAll();
        foreach ($results as $result) {
            echo $result['id'] . " " . $result['first'] . " " . $result['last'] . "</br>";
        }
        $_SESSION['view'] = 1;

    }
    protected function getIdOcupare($an, $spec, $grupa, $ora, $disc)
    {
        //TODO THINK THE REST OF THIS FUNCTION
    }
    public function insertPRezenta($id_user, $id_ocupare)
    {
        //TODO FINISH the rest of this.
    }
}
