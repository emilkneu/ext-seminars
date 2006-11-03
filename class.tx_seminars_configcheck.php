<?php
/***************************************************************
* Copyright notice
*
* (c) 2006 Oliver Klee (typo3-coding@oliverklee.de)
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

/**
 * Class 'tx_seminars_confcheck' for the 'seminars' extension.
 *
 * This class checks the Seminar Manager configuration for basic sanity.
 *
 * The correct functioning of this class does not rely on any HTML templates or
 * language files so it works even under the worst of circumstances.
 *
 * @author	Oliver Klee <typo3-coding@oliverklee.de>
 */

require_once(t3lib_extMgm::extPath('seminars').'class.tx_seminars_oe_configcheck.php');

class tx_seminars_configcheck extends tx_seminars_oe_configcheck {
	/**
	 * Checks the configuration for: tx_seminars_registrationmanager/.
	 *
	 * @access	private
	 */
	function check_tx_seminars_registrationmanager() {
		// The registration manager needs to be able to create registration
		// objects. So we check whether the prerequisites for registrations
		// are fullfilled as well.
		$this->check_tx_seminars_registration();

		return;
	}

	/**
	 * Checks the configuration for: tx_seminars_seminar/.
	 *
	 * @access	private
	 */
	function check_tx_seminars_seminar() {
		$this->checkStaticIncluded();
		$this->checkSalutationMode();
		$this->checkTimeAndDate();
		$this->checkShowTimeOfRegistrationDeadline();
		$this->checkShowVacanciesThreshold();

		return;
	}

	/**
	 * Checks the configuration for: tx_seminars_registration/.
	 *
	 * @access	private
	 */
	function check_tx_seminars_registration() {
		$this->checkStaticIncluded();
		$this->checkTemplateFile();
		$this->checkSalutationMode();

		$this->checkRegistrationFlag();

		$this->checkThankYouMail();
		$this->checkGeneralPriceInMail();
		$this->checkNotificationMail();
		if ($this->objectToCheck->getConfValueInteger('enableRegistration')) {
			$this->checkAttendancesPid();
		}

		return;
	}

	/**
	 * Checks the configuration for: tx_seminars_seminarbag/.
	 *
	 * @access	private
	 */
	function check_tx_seminars_seminarbag() {
		$this->checkStaticIncluded();

		return;
	}

	/**
	 * Checks the configuration for: tx_seminars_registrationbag/.
	 *
	 * @access	private
	 */
	function check_tx_seminars_registrationbag() {
		$this->checkStaticIncluded();

		return;
	}

	/**
	 * Checks the configuration for: tx_seminars_pi1/seminar_registration.
	 *
	 * @access	private
	 */
	function check_tx_seminars_pi1_seminar_registration() {
		$this->checkStaticIncluded();
		$this->checkTemplateFile(true);
		$this->checkCssFile(true);
		$this->checkSalutationMode(true);
		$this->checkCssClassNames();
		$this->checkWhatToDisplay();

		$this->checkRegistrationFlag();
		if ($this->objectToCheck->getConfValueBoolean('enableRegistration')) {
			$this->checkBaseUrl();
		}

		return;
	}

	/**
	 * Checks the configuration for: tx_seminars_pi1/single_view.
	 *
	 * @access	private
	 */
	function check_tx_seminars_pi1_single_view() {
		$this->checkStaticIncluded();
		$this->checkTemplateFile(true);
		$this->checkCssFile(true);
		$this->checkSalutationMode(true);
		$this->checkCssClassNames();
		$this->checkWhatToDisplay();

		$this->checkHideFields();

		return;
	}

	/**
	 * Checks the configuration for: tx_seminars_pi1/seminar_list.
	 *
	 * @access	private
	 */
	function check_tx_seminars_pi1_seminar_list() {
		$this->checkStaticIncluded();
		$this->checkTemplateFile(true);
		$this->checkCssFile(true);
		$this->checkSalutationMode(true);
		$this->checkCssClassNames();
		$this->checkWhatToDisplay();

		$this->checkHideColumns();
		$this->checkTimeframeInList();
		$this->checkHideSearchForm();
		$this->checkHidePageBrowser();
		$this->checkHideCanceledEvents();

		return;
	}

	/**
	 * Checks the configuration for: tx_seminars_pi1/my_vip_events.
	 *
	 * @access	private
	 */
	function check_tx_seminars_pi1_my_vip_events() {
		$this->check_tx_seminars_pi1_seminar_list();

		return;
	}

	/**
	 * Checks the configuration for: tx_seminars_pi1/my_events.
	 *
	 * @access	private
	 */
	function check_tx_seminars_pi1_my_events() {
		$this->check_tx_seminars_pi1_seminar_list();

		return;
	}

	/**
	 * Checks the configuration for: tx_seminars_pi1/list_registrations.
	 *
	 * @access	private
	 */
	function check_tx_seminars_pi1_list_registrations() {
		$this->checkStaticIncluded();
		$this->checkTemplateFile(true);
		$this->checkCssFile(true);
		$this->checkSalutationMode(true);
		$this->checkCssClassNames();
		$this->checkWhatToDisplay();

		return;
	}

	/**
	 * Checks the configuration for: tx_seminars_pi1/list_vip_registrations.
	 *
	 * @access	private
	 */
	function check_tx_seminars_pi1_list_vip_registrations() {
		$this->check_tx_seminars_pi1_list_registrations();

		return;
	}

	/**
	 * Checks the configuration related to thank-you e-mails.
	 *
	 * @access	private
	 */
	function checkThankYouMail() {
		$this->checkHideFieldsInThankYouMail();

		return;
	}

	/**
	 * Checks the configuration related to notification e-mails.
	 *
	 * @access	private
	 */
	function checkNotificationMail() {
		$this->checkHideFieldsInNotificationMail();
		$this->checkShowSeminarFieldsInNotificationMail();
		$this->checkShowFeUserFieldsInNotificationMail();
		$this->checkShowAttendanceFieldsInNotificationMail();
		$this->checkSendAdditionalNotificationEmails();

		return;
	}

	/**
	 * Checks the settings for time and date format.
	 *
	 * @access	private
	 */
	function checkTimeAndDate() {
		$explanation = 'This determines the way dates and times are '
			.'displayed. If this is not set correctly, dates and times might '
			.'be mangled or not get displayed at all.';
		$configVariables = array(
			'timeFormat',
			'dateFormatY',
			'dateFormatM',
			'dateFormatD',
			'dateFormatYMD',
			'dateFormatMD'
		);
		foreach ($configVariables as $configVariableToCheck) {
			$this->checkForNonEmptyString(
				$configVariableToCheck,
				false,
				'',
				$explanation
			);
		}

		$this->checkAbbreviateDateRanges();

		return;
	}

	/**
	 * Checks the setting of the configuration value baseUrl.
	 *
	 * @access	private
	 */
	function checkBaseUrl() {
		$baseUrl = $this->objectToCheck->getConfValueString('baseURL');

		if (!preg_match('/^http(s?):\/\/[a-z][a-z0-9_\.]+[a-z0-9]+\/([a-z0-9_\.]+\/)*$/', $baseUrl)) {
			$message = 'The specified base URL <strong>'
				.htmlspecialchars($baseUrl)
				.'</strong> is invalid. '
				.'This will cause incorrect URLs to be created in the e-mails '
				.'to the participants. '
				.'Please set the TS setup variable (or the corresponding '
				.'flexforms field) <strong>'.$this->getTSSetupPath()
				.'baseURL</strong> to a valid base URL, including the protocal '
				.'(http:// or https://) and the trailing slash.';
			$this->setErrorMessage($message);
		};

		return;
	}

	/**
	 * Checks the setting of the configuration value baseUrl.
	 *
	 * @access	private
	 */
	function checkRegistrationFlag() {
		$this->checkIfBoolean(
			'enableRegistration',
			false,
			'',
			'This value specifies whether the extension will use provide online'
				.'registration. If this value is incorrect, the online registration '
				.'will not be enabled or disabled correctly.'
		);

		return;
	}

	/**
	 * Checks the setting of the configuration value what_to_display.
	 *
	 * @access	private
	 */
	function checkWhatToDisplay() {
		$this->checkIfSingleInSetNotEmpty(
			'what_to_display',
			true,
			'sDEF',
			'This value specifies the type of seminar manager plug-in to '
				.'display. If this value is not set correctly, the wrong '
				.'type of plug-in will be displayed.',
			array(
				'seminar_list',
				'my_events',
				'my_vip_events',
				'seminar_registration',
				'list_registrations',
				'list_vip_registrations'
			)
		);

		return;
	}

	/**
	 * Checks the setting of the configuration value showTimeOfRegistrationDeadline.
	 *
	 * @access	private
	 */
	function checkShowTimeOfRegistrationDeadline() {
		$this->checkIfBoolean(
			'showTimeOfRegistrationDeadline',
			false,
			'',
			'This value specifies whether to also show the time of '
				.'registration deadlines. If this value is incorrect, the '
				.'time might get shown although this is not intended '
				.'(or vice versa).'
		);

		return;
	}

	/**
	 * Checks the setting of the configuration value showVacanciesThreshold.
	 *
	 * @access	private
	 */
	function checkShowVacanciesThreshold() {
		$this->checkIfInteger(
			'showVacanciesThreshold',
			false,
			'',
			'This value specifies down from which threshold the exact number '
				.'of vancancies will be displayed. If this value is incorrect, '
				.'the number might get shown although this is not intended '
				.'(or vice versa).'
		);

		return;
	}

	/**
	 * Checks the setting of the configuration value generalPriceInMail.
	 *
	 * @access	private
	 */
	function checkGeneralPriceInMail() {
		$this->checkIfBoolean(
			'generalPriceInMail',
			false,
			'',
			'This value specifies which wording to use for the standard price '
				.'in e-mails. If this value is incorrect, the wrong wording '
				.'might get used.'
		);

		return;
	}

	/**
	 * Checks the setting of the configuration value attendancesPID.
	 *
	 * @access	private
	 */
	function checkAttendancesPid() {
		$this->checkIfPositiveInteger(
			'attendancesPID',
			false,
			'',
			'This value specifies the page on which registrations will be '
				.'stored. If this value is not set correctly, registration '
				.'records will be dumped in the TYPO3 root page. If you '
				.'ecplicitely do not wish to use the online registration '
				.'feature, you can disable these checks by setting '
				.'<strong>plugin.tx_seminars.enableRegistration</strong> and '
				.'<strong>plugin.tx_seminars.enableRegistration_pi1</strong> '
				.'to 0.'
		);

		return;
	}

	/**
	 * Checks the setting of the configuration value hideFields.
	 *
	 * @access	private
	 */
	function checkHideFields() {
		$this->checkIfMultiInSetOrEmpty(
			'hideFields',
			true,
			's_template_special',
			'This value specifies which section to remove from the list view. '
				.'Incorrect value will cause the sections to still be displayed.',
			array(
				'title',
				'subtitle',
				'description',
				'accreditation_number',
				'credit_points',
				'date',
				'uid',
				'time',
				'place',
				'room',
				'speakers',
				'price_regular',
				'price_special',
				'paymentmethods',
				'organizers',
				'vacancies',
				'deadline_registration',
				'registration',
				'back'
			)
		);

		return;
	}

	/**
	 * Checks the setting of the configuration value hideColumns.
	 *
	 * @access	private
	 */
	function checkHideColumns() {
		$this->checkIfMultiInSetOrEmpty(
			'hideColumns',
			true,
			's_template_special',
			'This value specifies which columns to remove from the list view. '
				.'Incorrect value will cause the colums to still be displayed.',
			array(
				'title',
				'uid',
				'event_type',
				'accreditation_number',
				'credit_points',
				'speakers',
				'date',
				'time',
				'place',
				'price_regular',
				'price_special',
				'organizers',
				'vacancies',
				'registration'
			)
		);

		return;
	}

	/**
	 * Checks the setting of the configuration value timeframeInList.
	 *
	 * @access	private
	 */
	function checkTimeframeInList() {
		$this->checkIfSingleInSetNotEmpty(
			'timeframeInList',
			true,
			's_template_special',
			'This value specifies the time-frame from which events should be '
				.'displayed in the list view. An incorrect value will events '
				.'from a different time-frame cause to be displayed and other '
				.'events to not get displayed.',
			array(
				'all',
				'past',
				'pastAndCurrent',
				'current',
				'currentAndUpcoming',
				'upcoming',
				'deadlineNotOver'
			)
		);

		return;
	}

	/**
	 * Checks the setting of the configuration value hideSearchForm.
	 *
	 * @access	private
	 */
	function checkHideSearchForm() {
		$this->checkIfBoolean(
			'hideSearchForm',
			true,
			's_template_special',
			'This value specifies whether the search form in the list view '
				.'will be displayed. If this value is incorrect, the search '
				.'form might get displayed when this is not intended (or '
				.'vice versa).'
		);

		return;
	}

	/**
	 * Checks the setting of the configuration value hidePageBrowser.
	 *
	 * @access	private
	 */
	function checkHidePageBrowser() {
		$this->checkIfBoolean(
			'hidePageBrowser',
			true,
			's_template_special',
			'This value specifies whether the page browser in the list view '
				.'will be displayed. If this value is incorrect, the page '
				.'browser might get displayed when this is not intended (or '
				.'vice versa).'
		);

		return;
	}

	/**
	 * Checks the setting of the configuration value hideCanceledEvents.
	 *
	 * @access	private
	 */
	function checkHideCanceledEvents() {
		$this->checkIfBoolean(
			'hideCanceledEvents',
			true,
			's_template_special',
			'This value specifies whether canceled events will be removed '
				.'from the list view. If this value is incorrect, canceled '
				.'events might get displayed when this is not intended (or '
				.'vice versa).'
		);

		return;
	}

	/**
	 * Checks the setting of the configuration value hideFieldsInThankYouMail.
	 *
	 * @access	private
	 */
	function checkHideFieldsInThankYouMail() {
		$this->checkIfMultiInSetOrEmpty(
			'hideFieldsInThankYouMail',
			false,
			'',
			'These values specify the sections to hide in e-mails to '
				.'participants. A mistyped field name will cause the field to '
				.'be included nonetheless.',
			array(
				'hello',
				'title',
				'accreditation_number',
				'credit_points',
				'date',
				'time',
				'place',
				'room',
				'price_regular',
				'price_special',
				'paymentmethods',
				'url',
				'footer'
			)
		);

		return;
	}

	/**
	 * Checks the setting of the configuration value hideFieldsInNotificationMail.
	 *
	 * @access	private
	 */
	function checkHideFieldsInNotificationMail() {
		$this->checkIfMultiInSetOrEmpty(
			'hideFieldsInNotificationMail',
			false,
			'',
			'These values specify the sections to hide in e-mails to '
				.'organizers. A mistyped field name will cause the field to '
				.'be included nonetheless.',
			array(
				'hello',
				'summary',
				'seminardata',
				'feuserdata',
				'attendancedata'
			)
		);

		return;
	}

	/**
	 * Checks the setting of the configuration value showSeminarFieldsInNotificationMail.
	 *
	 * @access	private
	 */
	function checkShowSeminarFieldsInNotificationMail() {
		$this->checkIfMultiInSetOrEmpty(
			'showSeminarFieldsInNotificationMail',
			false,
			'',
			'These values specify the event fields to show in e-mails to '
				.'organizers. A mistyped field name will cause the field to '
				.'not get included.',
			array(
				'uid',
				'event_type',
				'title',
				'subtitle',
				'titleanddate',
				'date',
				'time',
				'accreditation_number',
				'credit_points',
				'room',
				'place',
				'speakers',
				'price_regular',
				'price_special',
				'attendees',
				'attendees_min',
				'attendees_max',
				'vacancies',
				'enough_attendees',
				'is_full',
				'notes'
			)
		);

		return;
	}

	/**
	 * Checks the setting of the configuration value showFeUserFieldsInNotificationMail.
	 *
	 * @access	private
	 */
	function checkShowFeUserFieldsInNotificationMail() {
		$this->checkIfMultiInTableOrEmpty(
			'showFeUserFieldsInNotificationMail',
			false,
			'',
			'These values specify the FE user fields to show in e-mails to '
				.'organizers. A mistyped field name will cause the field to '
				.'not get included.',
			'fe_users'
		);

		return;
	}

	/**
	 * Checks the setting of the configuration value showAttendanceFieldsInNotificationMail.
	 *
	 * @access	private
	 */
	function checkShowAttendanceFieldsInNotificationMail() {
		$this->checkIfMultiInSetOrEmpty(
			'showAttendanceFieldsInNotificationMail',
			false,
			'',
			'These values specify the registration fields to show in e-mails '
				.'to organizers. A mistyped field name will cause the field '
				.'to not get included.',
			array(
				'interests',
				'expectations',
				'background_knowledge',
				'accommodation',
				'food',
				'known_from',
				'notes',
				'seats'
			)
		);

		return;
	}

	/**
	 * Checks the setting of the configuration value sendAdditionalNotificationEmails.
	 *
	 * @access	private
	 */
	function checkSendAdditionalNotificationEmails() {
		$this->checkIfBoolean(
			'sendAdditionalNotificationEmails',
			false,
			'',
			'This value specifies whether organizers receive additional '
				.'notification e-mails. If this value is incorrect, e-mails '
				.'might get sent when this is not intended (or vice versa).'
		);

		return;
	}

	/**
	 * Checks the setting of the configuration value abbreviateDateRanges.
	 *
	 * @access	private
	 */
	function checkAbbreviateDateRanges() {
		$this->checkIfBoolean(
			'abbreviateDateRanges',
			false,
			'',
			'This value specifies whether date ranges will be abbreviated. '
				.'If this value is incorrect, the values might be abbreviated '
				.'although this is not intended (or vice versa).'
		);

		return;
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/seminars/class.tx_seminars_configcheck.php']) {
	include_once ($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/seminars/class.tx_seminars_configcheck.php']);
}

?>
