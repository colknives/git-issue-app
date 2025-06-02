<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class GitHubService
{
    protected string $token;

    public function __construct()
    {
        $this->base_url = 'https://api.github.com';
        $this->token = env('GITHUB_PERSONAL_TOKEN');
    }

    protected function headers(): array
    {
        return [
            'Authorization' => "Bearer {$this->token}",
            'Accept' => 'application/vnd.github.v3+json',
        ];
    }

    public function getAssignedOpenIssues(): array
    {
        $response = Http::withHeaders($this->headers())
            ->get("{$this->base_url}/issues", [
                'filter' => 'assigned',
                'state' => 'open',
                'per_page' => 100,
            ]);

        if ($response->successful()) {
            return $response->json();
        }

        logger()->error('GitHub API failed', ['response' => $response->body()]);
        return [];
    }

    public function getIssueDetails(string $repoOwner, string $repoName, int $issueNumber): array
    {
        $url = "{$this->base_url}/repos/{$repoOwner}/{$repoName}/issues/{$issueNumber}";

        $response = Http::withHeaders($this->headers())->get($url);

        if ($response->successful()) {
            return $response->json();
        }

        logger()->error('Failed to fetch issue details', ['response' => $response->body()]);
        return [];
    }
}
