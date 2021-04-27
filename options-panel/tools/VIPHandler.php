<?php


class VIPHandler {

	public static function get_vip_customer($user_id) {

		if ($user_id == 0){
			return;
		}

		$customer = rcp_get_customer_by_user_id( $user_id );

		if ( empty( $customer ) ) {
			return;
		}

		$memberships = $customer->get_memberships();

		$result = [
			'status' => '',
			'membership_level' => '',
			'created_date' => '',
			'expiration_date' => '',
		];
		foreach ( $memberships as $membership ) {
			$result['status'] = $membership->get_status();
			$result['created_date'] = $membership->get_created_date();
			$result['expiration_date'] = $membership->get_expiration_date();
			$member_id = $membership->get_id();
			$result['membership_level'] = rcp_get_customer_membership_level_names($member_id)[0];
		}
		return $result;
//		rcp_get_customer_membership_level_names($memberships)[0]
	}
}

new VIPHandler();