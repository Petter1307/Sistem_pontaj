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
    protected function getOraIDFromDatabase()
    {

        $houdId = $this->connect()->prepare('select getHourID() as ora;');
        $houdId->execute();
        $ora = $houdId->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $this->connect()->prepare('call getOraID(?)');
        if (!$stmt->execute(array($ora[0]['ora']))) {
            $error = 'getOraIDFromDatabaseFailed';
            $_SESSION['error'] = $error;
            header('location:../pages/prezenti.php?error=getOraIDFromDatabaseFailed');
            exit();
        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results[0]['id'];
    }
    protected function getIdOcupare($an, $spec, $grupa)
    {
        $ora = $this->getOraIDFromDatabase();
        // if ($ora == 7) {
        //     $error = "outOfWorkingHours";
        //     $_SESSION['error'] = $error;
        //     header('location:../pages/prezenti.php?error=outOfWorkingHours');
        //     exit();
        // }
        $stmt = $this->connect()->prepare('Select id_ocupare as id from orar where id_ora = ? and id_an = ? and id_specializare = ? and id_grupa = ? and id_ziua = ?;');
        if (!$stmt->execute(array($ora, $an, $spec, $grupa, date('w')))) {
            $error = "getIdOcupareFailed";
            $_SESSION['error'] = $error;
            header('location:../pages/prezenti.php?error=getIdOcupareFailed');
            exit();
        }
        if ($stmt->rowCount() == 0) {
            return 'none';
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results[0]['id'];
    }
    public function insertPRezenta($id_student, $saptamana, $an, $spec, $grupa, $disc)
    {
        $id_ocupare = $this->getIdOcupare($an, $spec, $grupa, $disc);
        if ($id_ocupare == 'none') {
            $error = "insertPRezFailure";
            $_SESSION['error'] = $error;
            header('location:../pages/prezenti.php?error=insertPRezFailure');
            exit();
        }
        $stmt = $this->connect()->prepare('INSERT into prezente(id_user,id_ora,id_saptamana) values (?,?,?)');
        if (!$stmt->execute(array($id_student, $id_ocupare, $saptamana))) {
            $error = "insertStmtPRezFailure";
            $_SESSION['error'] = $error;
            header('location:../pages/prezenti.php?error=insertStmtPRezFailure');
            exit();
        }
        //TODO Make  a way to check for duplicates in the database and remove duplicates.
        // maybe a trigger in the database.
    }
    public function testStuff()
    {
        $test = $this->getIdOcupare(1, 1, 1, 1);
        echo $test;
        // echo $this->insertPRezenta(1, 1, 1, 1, 1, 1);
    }
}
