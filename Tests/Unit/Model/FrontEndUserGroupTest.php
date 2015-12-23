<?php
/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

/**
 * Test case.
 *
 * @package TYPO3
 * @subpackage tx_seminars
 *
 * @author Bernd Schönbach <bernd@oliverklee.de>
 * @author Niels Pardon <mail@niels-pardon.de>
 * @author Oliver Klee <typo3-coding@oliverklee.de>
 */
class Tx_Seminars_Model_FrontEndUserGroupTest extends Tx_Phpunit_TestCase {
	/**
	 * @var Tx_Seminars_Model_FrontEndUserGroup the object to test
	 */
	private $fixture;

	protected function setUp() {
		$this->fixture = new Tx_Seminars_Model_FrontEndUserGroup();
	}

	///////////////////////////////////////
	// Tests concerning getPublishSetting
	///////////////////////////////////////

	/**
	 * @test
	 */
	public function getPublishSettingWithoutPublishSettingReturnsPublishAll() {
		$this->fixture->setData(array());

		self::assertEquals(
			Tx_Seminars_Model_FrontEndUserGroup::PUBLISH_IMMEDIATELY,
			$this->fixture->getPublishSetting()
		);
	}

	/**
	 * @test
	 */
	public function getPublishSettingWithPublishSettingSetToZeroReturnsPublishAll() {
		$this->fixture->setData(array('tx_seminars_publish_events' => 0));

		self::assertEquals(
			Tx_Seminars_Model_FrontEndUserGroup::PUBLISH_IMMEDIATELY,
			$this->fixture->getPublishSetting()
		);
	}

	/**
	 * @test
	 */
	public function getPublishSettingWithPublishSettingSetToOneReturnsHideNew() {
		$this->fixture->setData(array('tx_seminars_publish_events' => 1));

		self::assertEquals(
			Tx_Seminars_Model_FrontEndUserGroup::PUBLISH_HIDE_NEW,
			$this->fixture->getPublishSetting()
		);
	}

	/**
	 * @test
	 */
	public function getPublishSettingWithPublishSettingSetToTwoReturnsHideEdited() {
		$this->fixture->setData(array('tx_seminars_publish_events' => 2));

		self::assertEquals(
			Tx_Seminars_Model_FrontEndUserGroup::PUBLISH_HIDE_EDITED,
			$this->fixture->getPublishSetting()
		);
	}


	///////////////////////////////////////////////
	// Tests concerning getAuxiliaryRecordsPid().
	///////////////////////////////////////////////

	/**
	 * @test
	 */
	public function getAuxiliaryRecordsPidWithoutPidReturnsZero() {
		$this->fixture->setData(array());

		self::assertEquals(
			0,
			$this->fixture->getAuxiliaryRecordsPid()
		);
	}

	/**
	 * @test
	 */
	public function getAuxiliaryRecordsPidWithPidReturnsPid() {
		$this->fixture->setData(array('tx_seminars_auxiliary_records_pid' => 42));

		self::assertEquals(
			42,
			$this->fixture->getAuxiliaryRecordsPid()
		);
	}


	///////////////////////////////////////////////
	// Tests concerning hasAuxiliaryRecordsPid().
	///////////////////////////////////////////////

	/**
	 * @test
	 */
	public function hasAuxiliaryRecordsPidWithoutPidReturnsFalse() {
		$this->fixture->setData(array());

		self::assertFalse(
			$this->fixture->hasAuxiliaryRecordsPid()
		);
	}

	/**
	 * @test
	 */
	public function hasAuxiliaryRecordsPidWithPidReturnsTrue() {
		$this->fixture->setData(array('tx_seminars_auxiliary_records_pid' => 42));

		self::assertTrue(
			$this->fixture->hasAuxiliaryRecordsPid()
		);
	}


	//////////////////////////////////
	// Tests concerning the reviewer
	//////////////////////////////////

	/**
	 * @test
	 */
	public function hasReviewerForGroupWithoutReviewerReturnsFalse() {
		$this->fixture->setData(array('tx_seminars_reviewer' => NULL));

		self::assertFalse(
			$this->fixture->hasReviewer()
		);
	}

	/**
	 * @test
	 */
	public function hasReviewerForGroupWithReviewerReturnsTrue() {
		$backEndUser = new Tx_Oelib_Model_BackEndUser();

		$this->fixture->setData(array('tx_seminars_reviewer' => $backEndUser));

		self::assertTrue(
			$this->fixture->hasReviewer()
		);
	}

	/**
	 * @test
	 */
	public function getReviewerForGroupWithoutReviewerReturnsNull() {
		$this->fixture->setData(array('tx_seminars_reviewer' => NULL));

		self::assertNull(
			$this->fixture->getReviewer()
		);
	}

	/**
	 * @test
	 */
	public function getReviewerForGroupWithReviewerReturnsReviewer() {
		$backEndUser = new Tx_Oelib_Model_BackEndUser();

		$this->fixture->setData(array('tx_seminars_reviewer' => $backEndUser));

		self::assertSame(
			$backEndUser,
			$this->fixture->getReviewer()
		);
	}


	//////////////////////////////////////////////////
	// Tests concerning the event record storage PID
	//////////////////////////////////////////////////

	/**
	 * @test
	 */
	public function hasEventRecordPidForNoPidSetReturnsFalse() {
		$this->fixture->setData(array());

		self::assertFalse(
			$this->fixture->hasEventRecordPid()
		);
	}

	/**
	 * @test
	 */
	public function hasEventRecordPidForPidSetReturnsTrue() {
		$this->fixture->setData(array('tx_seminars_events_pid' => 42));

		self::assertTrue(
			$this->fixture->hasEventRecordPid()
		);
	}

	/**
	 * @test
	 */
	public function getEventRecordPidForNoPidSetReturnsZero() {
		$this->fixture->setData(array());

		self::assertEquals(
			0,
			$this->fixture->getEventRecordPid()
		);
	}

	/**
	 * @test
	 */
	public function getEventRecordPidForPidSetReturnsThisPid() {
		$this->fixture->setData(array('tx_seminars_events_pid' => 42));

		self::assertEquals(
			42,
			$this->fixture->getEventRecordPid()
		);
	}

	//////////////////////////////////////////
	// Tests concerning getDefaultCategories
	//////////////////////////////////////////

	/**
	 * @test
	 */
	public function getDefaultCategoriesForNoCategoriesReturnsAList() {
		$this->fixture->setData(array('tx_seminars_default_categories' => new Tx_Oelib_List()));

		self::assertInstanceOf(Tx_Oelib_List::class, $this->fixture->getDefaultCategories());
	}

	/**
	 * @test
	 */
	public function getDefaultCategoriesForOneAssignedCategoryReturnsThisCategoryInList() {
		$list = new Tx_Oelib_List();
		$category = tx_oelib_MapperRegistry::get(Tx_Seminars_Mapper_Category::class)
			->getNewGhost();

		$list->add($category);
		$this->fixture->setData(array('tx_seminars_default_categories' => $list));

		self::assertSame(
			$category,
			$this->fixture->getDefaultCategories()->first()
		);
	}


	//////////////////////////////////////////
	// Tests concerning hasDefaultCategories
	//////////////////////////////////////////

	/**
	 * @test
	 */
	public function hasDefaultCategoriesForNoAssignedCategoriesReturnsFalse() {
		$this->fixture->setData(array('tx_seminars_default_categories' => new Tx_Oelib_List()));

		self::assertFalse(
			$this->fixture->hasDefaultCategories()
		);
	}

	/**
	 * @test
	 */
	public function hasDefaultCategoriesForOneAssignedCategoryReturnsTrue() {
		$list = new Tx_Oelib_List();
		$list->add(
			tx_oelib_MapperRegistry::get(Tx_Seminars_Mapper_Category::class)
				->getNewGhost()
		);

		$this->fixture->setData(array('tx_seminars_default_categories' => $list));

		self::assertTrue(
			$this->fixture->hasDefaultCategories()
		);
	}


	/////////////////////////////////////////////////////////////////
	// Tests concerning getDefaultOrganizer and hasDefaultOrganizer
	/////////////////////////////////////////////////////////////////

	/**
	 * @test
	 */
	public function getDefaultOrganizerForSetOrganizerReturnsIt() {
		$organizer = tx_oelib_MapperRegistry::get(Tx_Seminars_Mapper_Organizer::class)
			->getNewGhost();
		$this->fixture->setData(array('tx_seminars_default_organizer' => $organizer));

		self::assertSame(
			$organizer,
			$this->fixture->getDefaultOrganizer()
		);
	}

	/**
	 * @test
	 */
	public function hasDefaultOrganizerForSetOrganizerReturnsTrue() {
		$organizer = tx_oelib_MapperRegistry::get(Tx_Seminars_Mapper_Organizer::class)
			->getNewGhost();
		$this->fixture->setData(array('tx_seminars_default_organizer' => $organizer));

		self::assertTrue(
			$this->fixture->hasDefaultOrganizer()
		);
	}

	/**
	 * @test
	 */
	public function hasDefaultOrganizerForNotSetOrganizerReturnsFalse() {
		$this->fixture->setData(array('tx_seminars_default_organizer' => NULL));

		self::assertFalse(
			$this->fixture->hasDefaultOrganizer()
		);
	}
}