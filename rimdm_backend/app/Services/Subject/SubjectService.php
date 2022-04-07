<?php
namespace App\Services\Subject;

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
}

?>
