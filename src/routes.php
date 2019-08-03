<?php

use Slim\Http\Request;
use Slim\Http\Response;
//compute 
$app->get('/fibonanci', function (Request $request, Response $response, array $args) {
        $x = 0; $y = 1;
        $max = 10000 + rand(0, 500);
        for ($i = 0; $i <= $max; $i++) {
            $z = $x + $y;
            $x = $y;
            $y = $z;
        }
    return $response->withJson(['status' => 'done']);
});
//single 
$app->get('/hello', function (Request $request, Response $response, array $args) {
    return $response->withJson(['hello' => 'world']);
});

$app->get("/departments", function (Request $request, Response $response){
    $sql = "SELECT * FROM departments";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson($result);
});

$app->get("/current-departments", function (Request $request, Response $response){
    $sql = "SELECT * FROM current_dept_emp limit 100";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson($result);
});
$app->get("/dept-emp", function (Request $request, Response $response){
    $sql = "SELECT * FROM dept_emp limit 100";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson($result);
});
$app->get("/dept-emp-lastest-date", function (Request $request, Response $response){
    $sql = "SELECT * FROM dept_emp_lastest_date limit 100";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson($result);
});
$app->get("/dept-manager", function (Request $request, Response $response){
    $sql = "SELECT * FROM dept_manager limit 100";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson($result);
});

$app->get("/employees", function (Request $request, Response $response){
    $sql = "SELECT * FROM employees limit 100";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson($result);
});

$app->get("/salaries", function (Request $request, Response $response){
    $sql = "SELECT * FROM salaries limit 100";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson($result);
});
$app->get("/titles", function (Request $request, Response $response){
    $sql = "SELECT * FROM titles limit 100";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson($result);
});
//one to many

$app->get("/employees-salaries", function (Request $request, Response $response){
    $sql = "SELECT * FROM employees JOIN salaries on employees.emp_no = salaries.emp_no LIMIT 100";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson($result);
});

$app->get("/employees-titles", function (Request $request, Response $response){
    $sql = "SELECT * FROM employees JOIN titles on employees.emp_no = titles.emp_no LIMIT 100";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson($result);
});
//many to many
$app->get("/department-manager", function (Request $request, Response $response){
    $sql = "SELECT * FROM dept_manager 
    JOIN employees on employees.emp_no = dept_manager.emp_no 
    JOIN departments on departments.dept_no = dept_manager.dept_no 
    LIMIT 100";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson($result);
});
$app->get("/department-employee", function (Request $request, Response $response){
    $sql = "SELECT * FROM dept_emp 
    JOIN employees on employees.emp_no = dept_emp.emp_no 
    JOIN departments on departments.dept_no = dept_emp.dept_no 
    LIMIT 100";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $response->withJson($result);
});