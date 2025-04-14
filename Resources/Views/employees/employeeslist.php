<?php

namespace views;

class EmployeeList {

    public function render($data) {

        require("Resources\\Views\\templates\\header.php");

        $html = '
        <form action="logout.php" method="post" style="text-align: right; margin: 10px;">
            <input type="submit" name="logout" id="logout" value="Logout">
        </form>

        <table border="1" cellspacing="0" cellpadding="8" style="width: 100%; text-align: left;">
            <thead>
                <tr>
                    <th>EmployeeID</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>Position</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($data as $employee) {
            $html .= "<tr>";
            $html .= "<td>{$employee['employeeID']}</td>";
            $html .= "<td>{$employee['firstName']}</td>";
            $html .= "<td>{$employee['lastName']}</td>";
            $html .= "<td>{$employee['title']}</td>";
            $html .= "</tr>";
        }

        $html .= '
            </tbody>
        </table>';

        echo $html;

        require("Resources\\Views\\templates\\footer.php");
    }
}