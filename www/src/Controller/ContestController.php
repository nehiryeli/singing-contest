<?php

namespace App\Controller;

use App\Entity\Contest\Contest;
use App\Repository\Contest\ContestRepository;
use App\Service\Contest\ContestService;

use App\Service\Judge\JudgeService;
use App\Service\Round\RoundService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContestController extends AbstractController
{

    /**
     * @Route("/", name="contest")
     * @param ContestService $contestService
     * @return Response
     */
    public function index(ContestService $contestService)
    {
        // Get active(running) contest
        /** @var Contest $contest */
        $contest = $contestService->getActiveContest();
        $ranking = array();
        $progress = array();

        if ($contest) {
            // if there is a active contest get the progress of rounds and ranking
            $progress = $contestService->getProgressOfActiveContest();
            $ranking = $contestService->getScores($contest);
        }

        return $this->render('front.html.twig', [
            'ranking' => $ranking,
            'progress' => $progress
        ]);
    }

    /**
     * @param ContestService $contestService
     * @return RedirectResponse
     * @throws \Exception
     * @Route("/create", name="create_contest")
     */
    public function createContest(ContestService $contestService)
    {
        $contestService->startContest();
        return $this->redirectToRoute("contest");

    }

    /**
     * @param RoundService $roundService
     * @return RedirectResponse
     * @Route("/next", name="next_round")
     */
    public function nextRound(RoundService $roundService)
    {
        $contestRepository = $this->getDoctrine()->getRepository(Contest::class);
        /** @var Contest $contest */
        $contest = $contestRepository->getUncompletedContest();

        $roundService->startNextRound($contest);

        return $this->redirectToRoute("contest");
    }

    /**
     * @Route("previous-contests", name="previous_contests")
     * @param ContestService $contestService
     * @return Response
     */
    public function previous_contests(ContestService $contestService)
    {
        $bestScoreContests = $contestService->getAllTimesBestScoreContest();

        // Get last 5 contests
        $contestRepository = $this->getDoctrine()->getRepository(Contest::class);
        $contests = $contestRepository->getLastContests(5);


        return $this->render('previous-contests.html.twig', [
            'contests' => $contests,
            'bestScoreContests' => $bestScoreContests
        ]);
    }


}
