<?php

declare(strict_types=1);

namespace Baraja\PackageManager;


class Buddy extends AbstractCi
{
	public static function isDetected(Env $env): bool
	{
		return $env->get('BUDDY') !== false;
	}


	public function getCiName(): string
	{
		return CiDetector::CI_BUDDY;
	}


	public function isPullRequest(): TrinaryLogic
	{
		return TrinaryLogic::createFromBoolean($this->env->getString('BUDDY_EXECUTION_PULL_REQUEST_ID') !== '');
	}


	public function getBuildNumber(): string
	{
		return $this->env->getString('BUDDY_EXECUTION_ID');
	}


	public function getBuildUrl(): string
	{
		return $this->env->getString('BUDDY_EXECUTION_URL');
	}


	public function getGitCommit(): string
	{
		return $this->env->getString('BUDDY_EXECUTION_REVISION');
	}


	public function getGitBranch(): string
	{
		return $this->env->getString('BUDDY_EXECUTION_BRANCH');
	}


	public function getRepositoryName(): string
	{
		return $this->env->getString('BUDDY_REPO_SLUG');
	}


	public function getRepositoryUrl(): string
	{
		return $this->env->getString('BUDDY_SCM_URL');
	}
}
