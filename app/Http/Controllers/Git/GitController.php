<?php

namespace App\Http\Controllers\Git;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

use App\Services\GitHubService;

class GitController extends Controller
{
    public function index(GitHubService $github): Response
    {
        $issues = $github->getAssignedOpenIssues();

        return Inertia::render('git/home', [
            'issues' => $issues
        ]);
    }

    public function detail(Request $request, GitHubService $github): Response
    {
        $repo = explode('/', $request->query('repo'));
        [$owner, $repoName] = $repo;

        $number = $request->query('number');

        $issue = $github->getIssueDetails($owner, $repoName, $number);

        return Inertia::render('git/detail', [
            'issue' => $issue
        ]);
    }
}
