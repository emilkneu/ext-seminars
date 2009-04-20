<?php
/***************************************************************
* Copyright notice
*
* (c) 2009 Niels Pardon (mail@niels-pardon.de)
* All rights reserved
*
* This script is part of the TYPO3 project. The TYPO3 project is
* free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation; either version 2 of the License, or
* (at your option) any later version.
*
* The GNU General Public License can be found at
* http://www.gnu.org/copyleft/gpl.html.
*
* This script is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

require_once(t3lib_extMgm::extPath('oelib') . 'class.tx_oelib_Autoloader.php');

/**
 * Testcase for the 'event model' class in the 'seminars' extension.
 *
 * This testcase holds all tests specific to event topics.
 *
 * @package TYPO3
 * @subpackage tx_seminars
 *
 * @author Niels Pardon <mail@niels-pardon.de>
 */
class tx_seminars_Model_EventTopic_testcase extends tx_phpunit_testcase {
	/**
	 * @var tx_seminars_Model_Event
	 */
	private $fixture;

	public function setUp() {
		$this->fixture = new tx_seminars_Model_Event();
	}

	public function tearDown() {
		$this->fixture->__destruct();
		unset($this->fixture);
	}


	//////////////////////////////////
	// Tests regarding the subtitle.
	//////////////////////////////////

	/**
	 * @test
	 */
	public function getSubtitleForEventTopicWithoutSubtitleReturnsAnEmptyString() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertEquals(
			'',
			$this->fixture->getSubtitle()
		);
	}

	/**
	 * @test
	 */
	public function getSubtitleForEventTopicWithSubtitleReturnsSubtitle() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'subtitle' => 'sub title',
			)
		);

		$this->assertEquals(
			'sub title',
			$this->fixture->getSubtitle()
		);
	}

	/**
	 * @test
	 */
	public function setSubtitleForEventTopicSetsSubtitle() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setSubtitle('sub title');

		$this->assertEquals(
			'sub title',
			$this->fixture->getSubtitle()
		);
	}

	/**
	 * @test
	 */
	public function hasSubtitleForEventTopicWithoutSubtitleReturnsFalse() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertFalse(
			$this->fixture->hasSubtitle()
		);
	}

	/**
	 * @test
	 */
	public function hasSubtitleForEventTopicWithSubtitleReturnsTrue() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setSubtitle('sub title');

		$this->assertTrue(
			$this->fixture->hasSubtitle()
		);
	}


	////////////////////////////////
	// Tests regarding the teaser.
	////////////////////////////////

	/**
	 * @test
	 */
	public function getTeaserForEventTopicWithoutTeaserReturnsAnEmptyString() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertEquals(
			'',
			$this->fixture->getTeaser()
		);
	}

	/**
	 * @test
	 */
	public function getTeaserForEventTopicWithTeaserReturnsTeaser() {
		$this->fixture->setData(
			array(
				'teaser' => 'wow, this is teasing',
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
			)
		);

		$this->assertEquals(
			'wow, this is teasing',
			$this->fixture->getTeaser()
		);
	}

	/**
	 * @test
	 */
	public function setTeaserForEventTopicSetsTeaser() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setTeaser('wow, this is teasing');

		$this->assertEquals(
			'wow, this is teasing',
			$this->fixture->getTeaser()
		);
	}

	/**
	 * @test
	 */
	public function hasTeaserForEventTopicWithoutTeaserReturnsFalse() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertFalse(
			$this->fixture->hasTeaser()
		);
	}

	/**
	 * @test
	 */
	public function hasTeaserForEventTopicWithTeaserReturnsTrue() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'teaser' => 'wow, this is teasing',
			)
		);

		$this->assertTrue(
			$this->fixture->hasTeaser()
		);
	}


	/////////////////////////////////////
	// Tests regarding the description.
	/////////////////////////////////////

	/**
	 * @test
	 */
	public function getDescriptionForEventTopicWithoutDescriptionReturnsAnEmptyString() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertEquals(
			'',
			$this->fixture->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionForEventTopicWithDescriptionReturnsDescription() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'description' => 'this is a great event.',
			)
		);

		$this->assertEquals(
			'this is a great event.',
			$this->fixture->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForEventTopicSetsDescription() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setDescription('this is a great event.');

		$this->assertEquals(
			'this is a great event.',
			$this->fixture->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function hasDescriptionForEventTopicWithoutDescriptionReturnsFalse() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertFalse(
			$this->fixture->hasDescription()
		);
	}

	/**
	 * @test
	 */
	public function hasDescriptionForEventTopicWithDescriptionReturnsTrue() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setDescription('this is a great event.');

		$this->assertTrue(
			$this->fixture->hasDescription()
		);
	}


	///////////////////////////////////////
	// Tests regarding the credit points.
	///////////////////////////////////////

	/**
	 * @test
	 */
	public function getCreditPointsForEventTopicWithoutCreditPointsReturnsZero() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertEquals(
			0,
			$this->fixture->getCreditPoints()
		);
	}

	/**
	 * @test
	 */
	public function getCreditPointsForEventTopicWithPositiveCreditPointsReturnsCreditPoints() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'credit_points' => 42,
			)
		);

		$this->assertEquals(
			42,
			$this->fixture->getCreditPoints()
		);
	}

	/**
	 * @test
	 */
	public function setCreditPointsForEventTopicWithZeroCreditPointsSetsCreditPoints() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setCreditPoints(0);

		$this->assertEquals(
			0,
			$this->fixture->getCreditPoints()
		);
	}

	/**
	 * @test
	 */
	public function setCreditPointsForEventTopicWithPositiveCreditPointsSetsCreditPoints() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setCreditPoints(42);

		$this->assertEquals(
			42,
			$this->fixture->getCreditPoints()
		);
	}

	/**
	 * @test
	 */
	public function hasCreditPointsForEventTopicWithoutCreditPointsReturnsFalse() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertFalse(
			$this->fixture->hasCreditPoints()
		);
	}

	/**
	 * @test
	 */
	public function hasCreditPointsForEventTopicWithCreditPointsReturnsTrue() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'credit_points' => 42,
			)
		);

		$this->assertTrue(
			$this->fixture->hasCreditPoints()
		);
	}


	///////////////////////////////////////
	// Tests regarding the regular price.
	///////////////////////////////////////

	/**
	 * @test
	 */
	public function getRegularPriceForEventTopicWithoutRegularPriceReturnsZero() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'price_regular' => 0.00,
			)
		);

		$this->assertEquals(
			0.00,
			$this->fixture->getRegularPrice()
		);
	}

	/**
	 * @test
	 */
	public function getRegularPriceForEventTopicWithPositiveRegularPriceReturnsRegularPrice() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'price_regular' => 42.42
			)
		);

		$this->assertEquals(
			42.42,
			$this->fixture->getRegularPrice()
		);
	}

	/**
	 * @test
	 */
	public function setRegularPriceForEventTopicWithZeroRegularPriceSetsRegularPrice() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setRegularPrice(0.00);

		$this->assertEquals(
			0.00,
			$this->fixture->getRegularPrice()
		);
	}

	/**
	 * @test
	 */
	public function setRegularPriceForEventTopicWithPositiveRegularPriceSetsRegularPrice() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setRegularPrice(42.42);

		$this->assertEquals(
			42.42,
			$this->fixture->getRegularPrice()
		);
	}

	/**
	 * @test
	 */
	public function hasRegularPriceForEventTopicWithoutRegularPriceReturnsFalse() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertFalse(
			$this->fixture->hasRegularPrice()
		);
	}

	/**
	 * @test
	 */
	public function hasRegularPriceForEventTopicWithRegularPriceReturnsTrue() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'price_regular' => 42.42
			)
		);

		$this->assertTrue(
			$this->fixture->hasRegularPrice()
		);
	}


	//////////////////////////////////////////////////
	// Tests regarding the regular early bird price.
	//////////////////////////////////////////////////

	/**
	 * @test
	 */
	public function getRegularEarlyBirdPriceForEventTopicWithoutRegularEarlyBirdPriceReturnsZero() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertEquals(
			0.00,
			$this->fixture->getRegularEarlyBirdPrice()
		);
	}

	/**
	 * @test
	 */
	public function getRegularEarlyBirdPriceForEventTopicWithPositiveRegularEarlyBirdPriceReturnsRegularEarlyBirdPrice() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'price_regular_early' => 42.42
			)
		);

		$this->assertEquals(
			42.42,
			$this->fixture->getRegularEarlyBirdPrice()
		);
	}

	/**
	 * @test
	 */
	public function setRegularEarlyBirdPriceForEventTopicWithNegativeRegularEarlyBirdPriceThrowsException() {
		$this->setExpectedException(
			'Exception', 'The parameter $price must be >= 0.00.'
		);

		$this->fixture->setRegularEarlyBirdPrice(-1.00);
	}

	/**
	 * @test
	 */
	public function setRegularEarlyBirdPriceForEventTopicWithZeroRegularEarlyBirdPriceSetsRegularEarlyBirdPrice() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setRegularEarlyBirdPrice(0.00);

		$this->assertEquals(
			0.00,
			$this->fixture->getRegularEarlyBirdPrice()
		);
	}

	/**
	 * @test
	 */
	public function setRegularEarlyBirdPriceForEventTopicWithPositiveRegularEarlyBirdPriceSetsRegularEarlyBirdPrice() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setRegularEarlyBirdPrice(42.42);

		$this->assertEquals(
			42.42,
			$this->fixture->getRegularEarlyBirdPrice()
		);
	}

	/**
	 * @test
	 */
	public function hasRegularEarlyBirdPriceForEventTopicWithoutRegularEarlyBirdPriceReturnsFalse() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertFalse(
			$this->fixture->hasRegularEarlyBirdPrice()
		);
	}

	/**
	 * @test
	 */
	public function hasRegularEarlyBirdPriceForEventTopicWithRegularEarlyBirdPriceReturnsTrue() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'price_regular_early' => 42.42,
			)
		);

		$this->assertTrue(
			$this->fixture->hasRegularEarlyBirdPrice()
		);
	}


	/////////////////////////////////////////////
	// Tests regarding the regular board price.
	/////////////////////////////////////////////

	/**
	 * @test
	 */
	public function getRegularBoardPriceForEventTopicWithoutRegularBoardPriceReturnsZero() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertEquals(
			0.00,
			$this->fixture->getRegularBoardPrice()
		);
	}

	/**
	 * @test
	 */
	public function getRegularBoardPriceForEventTopicWithPositiveRegularBoardPriceReturnsRegularBoardPrice() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'price_regular_board' => 42.42,
			)
		);

		$this->assertEquals(
			42.42,
			$this->fixture->getRegularBoardPrice()
		);
	}

	/**
	 * @test
	 */
	public function setRegularBoardPriceForEventTopicWithZeroRegularBoardPriceSetsRegularBoardPrice() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setRegularBoardPrice(0.00);

		$this->assertEquals(
			0.00,
			$this->fixture->getRegularBoardPrice()
		);
	}

	/**
	 * @test
	 */
	public function setRegularBoardPriceForEventTopicWithPositiveRegularBoardPriceSetsRegularBoardPrice() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setRegularBoardPrice(42.42);

		$this->assertEquals(
			42.42,
			$this->fixture->getRegularBoardPrice()
		);
	}

	/**
	 * @test
	 */
	public function hasRegularBoardPriceForEventTopicWithoutRegularBoardPriceReturnsFalse() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertFalse(
			$this->fixture->hasRegularBoadPrice()
		);
	}

	/**
	 * @test
	 */
	public function hasRegularBoardPriceForEventTopicWithRegularBoardPriceReturnsTrue() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'price_regular_board' => 42.42,
			)
		);

		$this->assertTrue(
			$this->fixture->hasRegularBoadPrice()
		);
	}


	///////////////////////////////////////
	// Tests regarding the special price.
	///////////////////////////////////////

	/**
	 * @test
	 */
	public function getSpecialPriceForEventTopicWithoutSpecialPriceReturnsZero() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertEquals(
			0.00,
			$this->fixture->getSpecialPrice()
		);
	}

	/**
	 * @test
	 */
	public function getSpecialPriceForEventTopicWithSpecialPriceReturnsSpecialPrice() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'price_special' => 42.42,
			)
		);

		$this->assertEquals(
			42.42,
			$this->fixture->getSpecialPrice()
		);
	}

	/**
	 * @test
	 */
	public function setSpecialPriceForEventTopicWithZeroSpecialPriceSetsSpecialPrice() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setSpecialPrice(0.00);

		$this->assertEquals(
			0.00,
			$this->fixture->getSpecialPrice()
		);
	}

	/**
	 * @test
	 */
	public function setSpecialPriceForEventTopicWithPositiveSpecialPriceSetsSpecialPrice() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setSpecialPrice(42.42);

		$this->assertEquals(
			42.42,
			$this->fixture->getSpecialPrice()
		);
	}

	/**
	 * @test
	 */
	public function hasSpecialPriceForEventTopicWithoutSpecialPriceReturnsFalse() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertFalse(
			$this->fixture->hasSpecialPrice()
		);
	}

	/**
	 * @test
	 */
	public function hasSpecialPriceForEventTopicWithSpecialPriceReturnsTrue() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setSpecialPrice(42.42);

		$this->assertTrue(
			$this->fixture->hasSpecialPrice()
		);
	}


	//////////////////////////////////////////////////
	// Tests regarding the special early bird price.
	//////////////////////////////////////////////////

	/**
	 * @test
	 */
	public function getSpecialEarlyBirdPriceForEventTopicWithoutSpecialEarlyBirdPriceReturnsZero() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertEquals(
			0.00,
			$this->fixture->getSpecialEarlyBirdPrice()
		);
	}

	/**
	 * @test
	 */
	public function getSpecialEarlyBirdPriceForEventTopicWithPositiveSpecialEarlyBirdPriceReturnsSpecialEarlyBirdPrice() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'price_special_early' => 42.42,
			)
		);

		$this->assertEquals(
			42.42,
			$this->fixture->getSpecialEarlyBirdPrice()
		);
	}

	/**
	 * @test
	 */
	public function setSpecialEarlyBirdPriceForEventTopicWithZeroSpecialEarlyBirdPriceSetsSpecialEarlyBirdPrice() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setSpecialEarlyBirdPrice(0.00);

		$this->assertEquals(
			0.00,
			$this->fixture->getSpecialEarlyBirdPrice()
		);
	}

	/**
	 * @test
	 */
	public function setSpecialEarlyBirdPriceForEventTopicWithPositiveSpecialEarlyBirdPriceSetsSpecialEarlyBirdPrice() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setSpecialEarlyBirdPrice(42.42);

		$this->assertEquals(
			42.42,
			$this->fixture->getSpecialEarlyBirdPrice()
		);
	}

	/**
	 * @test
	 */
	public function hasSpecialEarlyBirdPriceForEventTopicWithoutSpecialEarlyBirdPriceReturnsFalse() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertFalse(
			$this->fixture->hasSpecialEarlyBirdPrice()
		);
	}

	/**
	 * @test
	 */
	public function hasSpecialEarlyBirdPriceForEventTopicWithSpecialEarlyBirdPriceReturnsTrue() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'price_special_early' => 42.42,
			)
		);

		$this->assertTrue(
			$this->fixture->hasSpecialEarlyBirdPrice()
		);
	}


	/////////////////////////////////////////////
	// Tests regarding the special board price.
	/////////////////////////////////////////////

	/**
	 * @test
	 */
	public function getSpecialBoardPriceForEventTopicWithoutSpecialBoardPriceReturnsZero() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertEquals(
			0.00,
			$this->fixture->getSpecialBoardPrice()
		);
	}

	/**
	 * @test
	 */
	public function getSpecialBoardPriceForEventTopicWithSpecialBoardPriceReturnsSpecialBoardPrice() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'price_special_board' => 42.42,
			)
		);

		$this->assertEquals(
			42.42,
			$this->fixture->getSpecialBoardPrice()
		);
	}

	/**
	 * @test
	 */
	public function setSpecialBoardPriceForEventTopicWithZeroSpecialBoardPriceSetsSpecialBoardPrice() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setSpecialBoardPrice(0.00);

		$this->assertEquals(
			0.00,
			$this->fixture->getSpecialBoardPrice()
		);
	}

	/**
	 * @test
	 */
	public function setSpecialBoardPriceForEventTopicWithPositiveSpecialBoardPriceSetsSpecialBoardPrice() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setSpecialBoardPrice(42.42);

		$this->assertEquals(
			42.42,
			$this->fixture->getSpecialBoardPrice()
		);
	}

	/**
	 * @test
	 */
	public function hasSpecialBoardPriceForEventTopicWithoutSpecialBoardPriceReturnsFalse() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertFalse(
			$this->fixture->hasSpecialBoardPrice()
		);
	}

	/**
	 * @test
	 */
	public function hasSpecialBoardPriceForEventTopicWithSpecialBoardPriceReturnsTrue() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setSpecialBoardPrice(42.42);

		$this->assertTrue(
			$this->fixture->hasSpecialBoardPrice()
		);
	}


	////////////////////////////////////////////////
	// Tests regarding the additional information.
	////////////////////////////////////////////////

	/**
	 * @test
	 */
	public function getAdditionalInformationForEventTopicWithoutAdditionalInformationReturnsEmptyString() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertEquals(
			'',
			$this->fixture->getAdditionalInformation()
		);
	}

	/**
	 * @test
	 */
	public function getAdditionalInformationForEventTopicWithAdditionalInformationReturnsAdditionalInformation() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'additional_information' => 'this is good to know',
			)
		);

		$this->assertEquals(
			'this is good to know',
			$this->fixture->getAdditionalInformation()
		);
	}

	/**
	 * @test
	 */
	public function setAdditionalInformationForEventTopicSetsAdditionalInformation() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setAdditionalInformation('this is good to know');

		$this->assertEquals(
			'this is good to know',
			$this->fixture->getAdditionalInformation()
		);
	}

	/**
	 * @test
	 */
	public function hasAdditionalInformationForEventTopicWithoutAdditionalInformationReturnsFalse() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertFalse(
			$this->fixture->hasAdditionalInformation()
		);
	}

	/**
	 * @test
	 */
	public function hasAdditionalInformationForEventTopicWithAdditionalInformationReturnsTrue() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'additional_information' => 'this is good to know',
			)
		);

		$this->assertTrue(
			$this->fixture->hasAdditionalInformation()
		);
	}


	//////////////////////////////////////////////////
	// Tests regarding allowsMultipleRegistration().
	//////////////////////////////////////////////////

	/**
	 * @test
	 */
	public function allowsMultipleRegistrationForEventTopicWithUnsetAllowsMultipleRegistrationReturnsFalse() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertFalse(
			$this->fixture->allowsMultipleRegistrations()
		);
	}

	/**
	 * @test
	 */
	public function allowsMultipleRegistrationForEventTopicWithSetAllowsMultipleRegistrationReturnsTrue() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'allows_multiple_registrations' => true,
			)
		);

		$this->assertTrue(
			$this->fixture->allowsMultipleRegistrations()
		);
	}


	//////////////////////////////////
	// Tests regarding usesTerms2().
	//////////////////////////////////

	/**
	 * @test
	 */
	public function usesTerms2ForEventTopicWithUnsetUseTerms2ReturnsFalse() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertFalse(
			$this->fixture->usesTerms2()
		);
	}

	/**
	 * @test
	 */
	public function usesTerms2ForEventTopicWithSetUseTerms2ReturnsTrue() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'use_terms_2' => true,
			)
		);

		$this->assertTrue(
			$this->fixture->usesTerms2()
		);
	}


	///////////////////////////////
	// Tests regarding the notes.
	///////////////////////////////

	/**
	 * @test
	 */
	public function getNotesForEventTopicWithoutNotesReturnsEmptyString() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertEquals(
			'',
			$this->fixture->getNotes()
		);
	}

	/**
	 * @test
	 */
	public function getNotesForEventTopicWithNotesReturnsNotes() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'notes' => 'Don\'t forget this.',
			)
		);

		$this->assertEquals(
			'Don\'t forget this.',
			$this->fixture->getNotes()
		);
	}

	/**
	 * @test
	 */
	public function setNotesForEventTopicSetsNotes() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setNotes('Don\'t forget this.');

		$this->assertEquals(
			'Don\'t forget this.',
			$this->fixture->getNotes()
		);
	}

	/**
	 * @test
	 */
	public function hasNotesForEventTopicWithoutNotesReturnsFalse() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertFalse(
			$this->fixture->hasNotes()
		);
	}

	/**
	 * @test
	 */
	public function hasNotesForEventTopicWithNotesReturnsTrue() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'notes' => 'Don\'t forget this.',
			)
		);

		$this->assertTrue(
			$this->fixture->hasNotes()
		);
	}


	///////////////////////////////
	// Tests regarding the image.
	///////////////////////////////

	/**
	 * @test
	 */
	public function getImageForEventTopicWithoutImageReturnsEmptyString() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertEquals(
			'',
			$this->fixture->getImage()
		);
	}

	/**
	 * @test
	 */
	public function getImageForEventTopicWithImageReturnsImage() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'image' => 'file.jpg',
			)
		);

		$this->assertEquals(
			'file.jpg',
			$this->fixture->getImage()
		);
	}

	/**
	 * @test
	 */
	public function setImageForEventTopicSetsImage() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);
		$this->fixture->setImage('file.jpg');

		$this->assertEquals(
			'file.jpg',
			$this->fixture->getImage()
		);
	}

	/**
	 * @test
	 */
	public function hasImageForEventTopicWithoutImageReturnsFalse() {
		$this->fixture->setData(
			array('object_type' => tx_seminars_Model_Event::TYPE_TOPIC)
		);

		$this->assertFalse(
			$this->fixture->hasImage()
		);
	}

	/**
	 * @test
	 */
	public function hasImageForEventTopicWithImageReturnsTrue() {
		$this->fixture->setData(
			array(
				'object_type' => tx_seminars_Model_Event::TYPE_TOPIC,
				'image' => 'file.jpg',
			)
		);

		$this->assertTrue(
			$this->fixture->hasImage()
		);
	}
}
?>