// INWESTYCJE
function get_investments_from_esti(){
  $company = '5701';
  $token = '2f9670d05e';
  $investments = [];
  $results = wp_remote_retrieve_body( wp_remote_get('https://app.esticrm.pl/apiClient/investment/list?company=' . $company . '&token=' . $token));

  $results = json_decode($results);

  $investments[] = $results->data;

  foreach ($investments[0] as $investment) {
    $investment_slug = sanitize_title($investment->estate_investment->name . '-' . $investment->estate_investment->id);
    $investment_title = sanitize_title($investment->estate_investment->name);
    $existing_investment = get_page_by_path($investment_slug, 'OBJECT', 'inwestycje');

    if($existing_investment === null) {
      $inserted_investment = wp_insert_post([
        'post_name' => $investment_slug,
        'post_title' => $investment_title,
        'post_type' => 'inwestycje',
        'post_status' => 'publish',
      ]);
  
      if(is_wp_error($inserted_investment)) {
        continue;
      }
      // Custom Fields
      $photo = $investment->estate_investment->photo_list;
      $photo_converted_to_array = (array) $photo;
      $main_image = (is_array($photo) ? $photo[0] : $photo_converted_to_array[1]);
      // $main_image = (!empty($investment->estate_investment->photo_list) ? $investment->estate_investment->photo_list[0] : $investment->estate_investment->photo_list["1"]);
      // $image_01 = (!empty($investment->pictures[1]) ? $investment->pictures[1] : null);
      // $image_02 = (!empty($investment->pictures[2]) ? $investment->pictures[2] : null);
      // $image_03 = (!empty($investment->pictures[3]) ? $investment->pictures[3] : null);
      // $image_04 = (!empty($investment->pictures[4]) ? $investment->pictures[4] : null);
      // $image_05 = (!empty($investment->pictures[5]) ? $investment->pictures[5] : null);
      // $image_06 = (!empty($investment->pictures[6]) ? $investment->pictures[6] : null);
      // $image_07 = (!empty($investment->pictures[7]) ? $investment->pictures[7] : null);
      // $image_08 = (!empty($investment->pictures[8]) ? $investment->pictures[8] : null);

      // $opis = array(
      //   'field_5f460d6b428e6' => $investment->estate_investment->description,
      // );
      update_field('field_5f460d6b428e6', $investment->estate_investment->description, $inserted_investment); // done field id

      $lead_image = array(
        'field_5f460d6b42115' => $main_image,
      );
      update_field('field_5f460d6b42115', $main_image, $inserted_investment);

      // $images = array(
      //   'field_5f460d6bbaae2' => $image_01,
      //   'field_5f460d6bbaeca' => $image_02,
      //   'field_5f460d6bbb2b2' => $image_03,
      //   'field_5f460d6bbb69a' => $image_04,
      //   'field_5f460d6bbba82' => $image_05,
      //   'field_5f460d6bbbe6a' => $image_06,
      //   'field_5f460d6bbc252' => $image_07,
      //   'field_5f460d6bbc63a' => $image_08,
      // );
      // update_field('field_5f460d6b42cce', $images, $inserted_investment);

      $summary = array(
        'field_5f460d6b54de2' => (!empty($investment->estate_investment->name) ? $investment->estate_investment->name : null),
        'field_5f460d6b53672' => (!empty($investment->estate_investment->location_city_name) ? $investment->estate_investment->location_city_name : null),
        'field_5f460d6b53a5a' => (!empty($investment->estate_investment->location_precinct_name) ? $investment->estate_investment->location_precinct_name : null),
        'field_5f460d6b53289' => (!empty($investment->estate_investment->price_from) ? $investment->estate_investment->price_from : null),
        'field_5f46166311aa9' => (!empty($investment->estate_investment->price_to) ? $investment->estate_investment->price_to : null),
        'field_5f46173911aac' => (!empty($investment->estate_investment->price_permeter_from) ? $investment->estate_investment->price_permeter_from : null),
        'field_5f46173811aab' => (!empty($investment->estate_investment->price_permeter_to) ? $investment->estate_investment->price_permeter_to : null),
        'field_5f460d6b53e42' => (!empty($investment->estate_investment->area_from) ? $investment->estate_investment->area_from : null),
        'field_5f4616bf11aaa' => (!empty($investment->estate_investment->area_to) ? $investment->estate_investment->area_to : null),
        'field_5f460d6b5422a' => (!empty($investment->estate_investment->property_number_all) ? $investment->estate_investment->property_number_all : null),
        'field_5f460d6b54612' => (!empty($investment->estate_investment->ready_date) ? $investment->estate_investment->ready_date : null),
      );
      update_field('field_5f460d6b424fe', $summary, $inserted_investment);

      update_field('field_5f86aa1c6bae0', $investment->estate_investment->update_date, $inserted_investment);

    } else {

      // $existing_investment_id = $existing_investment->ID;
      // $existing_investment_timestamp = get_field('data_aktualizacji', $existing_investment_id);

      // if($investment->updateDate >= $existing_investment_timestamp) {

      //   $main_image = $offer->pictures[0];
      //   $image_01 = (!empty($offer->pictures[1]) ? $offer->pictures[1] : null);
      //   $image_02 = (!empty($offer->pictures[2]) ? $offer->pictures[2] : null);
      //   $image_03 = (!empty($offer->pictures[3]) ? $offer->pictures[3] : null);
      //   $image_04 = (!empty($offer->pictures[4]) ? $offer->pictures[4] : null);
      //   $image_05 = (!empty($offer->pictures[5]) ? $offer->pictures[5] : null);
      //   $image_06 = (!empty($offer->pictures[6]) ? $offer->pictures[6] : null);
      //   $image_07 = (!empty($offer->pictures[7]) ? $offer->pictures[7] : null);
      //   $image_08 = (!empty($offer->pictures[8]) ? $offer->pictures[8] : null);
  
      //   $opis = array(
      //     'field_5f7cb14fbc50c' => $offer->portalTitle,
      //     'field_5f7cb169bc50d' => $offer->descriptionWebsite,
      //   );
      //   update_field('field_5f2da3f1954be', $opis, $existing_offer_id);
  
      //   $lead_image = array(
      //     'field_5f30ea32c11f8' => $main_image,
      //   );
      //   update_field('field_5f30ea32c11f8', $main_image, $existing_offer_id);
  
      //   $images = array(
      //     'field_5f3189a0eecde' => $image_01,
      //     'field_5f3189d2eecdf' => $image_02,
      //     'field_5f3189faeece0' => $image_03,
      //     'field_5f318a0eeece1' => $image_04,
      //     'field_5f318a28eece2' => $image_05,
      //     'field_5f318a3feece3' => $image_06,
      //     'field_5f318a50eece4' => $image_07,
      //     'field_5f318a62eece5' => $image_08,
      //   );
      //   update_field('field_5f318979eecdd', $images, $existing_offer_id);
  
      //   $summary = array(
      //     'field_5f2da029250e4' => $offer->price,
      //     'field_5f7d6523f705c' => $offer->pricePermeter,
      //     'field_5f2da0b6250e6' => $offer->locationCityName,
      //     'field_5f7d688fb363d' => $offer->locationStreetType,
      //     'field_5f2da0e1250e7' => $offer->locationStreetName,
      //     'field_5f2da106250e8' => $offer->areaTotal,
      //     'field_5f2da128250e9' => $offer->apartmentRoomNumber,
      //     'field_5f2da14e250ea' => $offer->buildingYear,
      //     'field_5f301d5b56ced' => $offer->apartmentBathroomNumber,
      //     'field_5f3022e442ee8' => $offer->typeName,
      //   );
      //   update_field('field_5f2d9fa0250e3', $summary, $existing_offer_id);

      //   update_field('field_5f7ec1e88aa5b', $offer->updateDate, $existing_offer_id);
      // }
    }
  }
}
// if(!wp_next_scheduled('update_investment_list')) {
//   wp_schedule_event(time(), 'daily', 'get_investments_from_esti');
// }

add_action('wp_ajax_nopriv_get_investments_from_esti', 'get_investments_from_esti');
add_action('wp_ajax_get_investments_from_esti', 'get_investments_from_esti');