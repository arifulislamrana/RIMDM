<?php
namespace App\Services\Subject;

use App\DataObjects\Subject;
use App\Repository\SubjectRepository\ISubjectRepository;

class SubjectService implements ISubjectService
{
    protected $subjectRepository;

    public function __construct(ISubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    public function getSubjectsOfSpecificClass($id)
    {
        return $this->subjectRepository->getSubjectsByClassId($id);
    }

    public function saveNewSubject(Subject $subjectData)
    {
        $sub = $this->subjectRepository->create([
            'name' => $subjectData->name,
            'class_level_id' => $subjectData->class,
            'teacher_id' => $subjectData->teacher
        ]);

        return $sub;
    }

    public function doesSubjectExist($name, $class)
    {
        $subj = $this->subjectRepository->doesExist($name, $class);

        if (isset($subj))
        {
            return true;
        }
        else
        {
            return false;
        }

    }
}

?>
