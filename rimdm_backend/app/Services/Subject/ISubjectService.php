<?php
namespace App\Services\Subject;

use App\DataObjects\Subject;

interface ISubjectService
{
    public function getSubjectsOfSpecificClass($id);

    public function saveNewSubject(Subject $subjectData);

    public function doesSubjectExist($name, $class);
}
?>
