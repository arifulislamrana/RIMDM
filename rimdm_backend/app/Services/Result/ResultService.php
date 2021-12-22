<?php
namespace App\Services\Result;

use App\DataObjects\Result;
use App\Repository\ResultRepository\IResultRepository;

class ResultService implements IResultService
{
    protected $ResultRepository;

    public function __construct(IResultRepository $ResultRepository)
    {
        $this->ResultRepository = $ResultRepository;
    }

    public function calculateGrade($mark)
    {
        $grade = "";

        if ($mark > 79)
        {
            $grade = "A+";
        }
        elseif ($mark > 69)
        {
            $grade = "A";
        }
        elseif ($mark > 59)
        {
            $grade = "A-";
        }
        elseif ($mark > 49)
        {
            $grade = "B";
        }
        elseif ($mark > 39)
        {
            $grade = "C";
        }
        elseif ($mark > 32)
        {
            $grade = "D";
        }
        else
        {
            $grade = "F";
        }

        return $grade;
    }
    public function getResultByStudentId($id)
    {
        $results = $this->ResultRepository->getResultsOfStudentById($id);

        if (empty($results))
        {
            return response('Result Data is Not included');
        }

        $resultData = [];

        foreach ($results as $result)
        {
            $resultDataObj = new Result();
            $resultDataObj->subject = $result->subject->name;
            $resultDataObj->marks = $result->marks;
            $resultDataObj->year = $result->year;
            $resultDataObj->term = $result->term;
            $resultDataObj->grade = $this->calculateGrade($result->marks);

            array_push($resultData, $resultDataObj);
        }

        return $resultData;
    }
}

?>
