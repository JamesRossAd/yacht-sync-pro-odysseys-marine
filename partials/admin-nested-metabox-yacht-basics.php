<?php

    $yacht_ysp_general_boat_description = get_post_meta( $post->ID, 'GeneralBoatDescription', true );

    $sales_rep = get_post_meta( $post->ID, 'SalesRep', true );

    if (isset($sales_rep->Name)) {
        $yacht_ysp_sales_rep_party_id = $sales_rep->PartyId;
        $yacht_ysp_sales_rep_name = $sales_rep->Name;
    }
    else {
        $yacht_ysp_sales_rep_party_id='';
        $yacht_ysp_sales_rep_name='';
    }

    $engines = get_post_meta( $post->ID, 'Engines', true );

    if(isset($engines[0])) {
        $yacht_ysp_engine_1_make = $engines[0]->Make;
        $yacht_ysp_engine_1_model = $engines[0]->Model;
        $yacht_ysp_engine_1_fuel = $engines[0]->Fuel;
        $yacht_ysp_engine_1_engine_power = $engines[0]->EnginePower;
        $yacht_ysp_engine_1_type = $engines[0]->Type;
        $yacht_ysp_engine_1_year = $engines[0]->Year;
        $yacht_ysp_engine_1_hours = $engines[0]->Hours;
        $yacht_ysp_engine_1_boat_engine_location_code = $engines[0]->BoatEngineLocationCode;
    }
    else {
        $yacht_ysp_engine_1_make = "";
        $yacht_ysp_engine_1_model = "";
        $yacht_ysp_engine_1_fuel = "";
        $yacht_ysp_engine_1_engine_power = "";
        $yacht_ysp_engine_1_type = "";
        $yacht_ysp_engine_1_year = "";
        $yacht_ysp_engine_1_hours = "";
        $yacht_ysp_engine_1_boat_engine_location_code = "";
    }

    if (isset($engines[1])) {
        $yacht_ysp_engine_2_make = $engines[1]->Make;
        $yacht_ysp_engine_2_model = $engines[1]->Model;
        $yacht_ysp_engine_2_fuel = $engines[1]->Fuel;
        $yacht_ysp_engine_2_engine_power = $engines[1]->EnginePower;
        $yacht_ysp_engine_2_type = $engines[1]->Type;
        $yacht_ysp_engine_2_year = $engines[1]->Year;
        $yacht_ysp_engine_2_hours = $engines[1]->Hours;
        $yacht_ysp_engine_2_boat_engine_location_code = $engines[1]->BoatEngineLocationCode;
    }
    else {
        $yacht_ysp_engine_2_make = "";
        $yacht_ysp_engine_2_model = "";
        $yacht_ysp_engine_2_fuel = "";
        $yacht_ysp_engine_2_engine_power = "";
        $yacht_ysp_engine_2_type = "";
        $yacht_ysp_engine_2_year = "";
        $yacht_ysp_engine_2_hours = "";
        $yacht_ysp_engine_2_boat_engine_location_code = "";
    }

    $images = get_post_meta( $post->ID, 'Images', true );

	$youtube_data = get_post_meta( $post->ID, 'YSP_YouTubeData', true );
	if ( ! is_array( $youtube_data ) ) {
		$youtube_data = [];
	}

	$virtual_tours = get_post_meta( $post->ID, 'YSP_VirtualTours', true );
	if ( ! is_array( $virtual_tours ) ) {
		$virtual_tours = [];
	}

	$captains_view_360 = get_post_meta( $post->ID, 'YSP_CaptainsView360', true );
	if ( ! is_string( $captains_view_360 ) ) {
		$captains_view_360 = '';
	}

	$captains_view_360_link = get_post_meta( $post->ID, 'YSP_CaptainsView360_Link', true );
	if ( ! is_string( $captains_view_360_link ) ) {
		$captains_view_360_link = '';
	}

	$yacht_additional_detail_description = get_post_meta( $post->ID, 'AdditionalDetailDescription', true );
	if ( is_array( $yacht_additional_detail_description ) ) {
		$yacht_additional_detail_description = $yacht_additional_detail_description[0] ?? '';
	}

   // var_dump($images);
/*
    $yacht_ysp_image_1 = $images[0]->Uri;
    $yacht_ysp_image_2 = $images[1]->Uri;
    $yacht_ysp_image_3 = $images[2]->Uri;
    $yacht_ysp_image_4 = $images[3]->Uri;
    $yacht_ysp_image_5 = $images[4]->Uri;
    $yacht_ysp_image_6 = $images[5]->Uri;
    $yacht_ysp_image_7 = $images[6]->Uri;
    $yacht_ysp_image_8 = $images[7]->Uri;
    $yacht_ysp_image_9 = $images[8]->Uri;
    $yacht_ysp_image_10 = $images[9]->Uri;
    $yacht_ysp_image_11 = $images[10]->Uri;
    $yacht_ysp_image_12 = $images[11]->Uri;
    $yacht_ysp_image_13 = $images[12]->Uri;
    $yacht_ysp_image_14 = $images[13]->Uri;
    $yacht_ysp_image_15 = $images[14]->Uri;
    $yacht_ysp_image_16 = $images[15]->Uri;
    $yacht_ysp_image_17 = $images[16]->Uri;
    $yacht_ysp_image_18 = $images[17]->Uri;
    $yacht_ysp_image_19 = $images[18]->Uri;
    $yacht_ysp_image_20 = $images[19]->Uri;*/

?>


<div id="yacht-nested-metabox-basics">
    <?php
		$summary_content = '';
		if ( isset( $yacht_ysp_general_boat_description[0] ) ) {
			$summary_content = (string) $yacht_ysp_general_boat_description[0];
		} elseif ( is_string( $yacht_ysp_general_boat_description ) ) {
			$summary_content = $yacht_ysp_general_boat_description;
		}

		$description_content = (string) $yacht_additional_detail_description;

		$editor_settings = [
			'textarea_rows' => 12,
			'media_buttons' => true,
			'teeny' => false,
			'quicktags' => true,
			'wpautop' => true,
			'tinymce' => [
				'resize' => true,
				'wp_autoresize_on' => true,
			],
		];
	?>
	<h3>Descriptions</h3>
    <div class="metafield ysp-wysiwyg-field">
        <label for="General_Boat_Description">Summary</label>
		<?php
			wp_editor(
				$summary_content,
				'General_Boat_Description',
				array_merge( $editor_settings, [
					'textarea_name' => 'General_Boat_Description',
					'textarea_rows' => 10,
				] )
			);
		?>
		<p class="description">Shown at the top of the listing description area.</p>
    </div>
	<div class="metafield ysp-wysiwyg-field">
		<label for="Additional_Detail_Description">Description</label>
		<?php
			wp_editor(
				$description_content,
				'Additional_Detail_Description',
				array_merge( $editor_settings, [
					'textarea_name' => 'Additional_Detail_Description',
					'textarea_rows' => 14,
				] )
			);
		?>
		<p class="description">Shown below the Description heading on the listing page.</p>
	</div>

	<h3 style="margin-top:24px;">Captain's View 360</h3>
	<p class="description">Embeddable 360 tour URL for the Captain's View 360 section (shown above Video on the listing page).</p>
	<div class="metafield">
		<label>Captain's View 360 URL</label>
		<input type="url" name="YSP_CaptainsView360" value="<?= esc_attr( $captains_view_360 ) ?>" placeholder="https://...">
	</div>
	<div class="metafield">
		<label>Captain's View 360 External Link</label>
		<input type="url" name="YSP_CaptainsView360_Link" value="<?= esc_attr( $captains_view_360_link ) ?>" placeholder="https://...">
		<p class="description">Optional. If filled, a “View Full Tour” button appears under the embed and opens this URL in a new tab.</p>
	</div>

	<h3 style="margin-top:24px;">Videos (YouTube)</h3>
	<p class="description">Paste a YouTube URL or 11-character video ID. These power the Video section on the listing page.</p>
	<?php for ( $v = 0; $v < 3; $v++ ) :
		$yt_id = isset( $youtube_data[ $v ]->YoutubeID ) ? $youtube_data[ $v ]->YoutubeID : '';
		$yt_title = isset( $youtube_data[ $v ]->Title ) ? $youtube_data[ $v ]->Title : '';
	?>
		<div class="metafield">
			<label>YouTube Video <?= $v + 1 ?> ID / URL</label>
			<input type="text" name="YSP_YouTube_<?= $v ?>" value="<?= esc_attr( $yt_id ) ?>" placeholder="https://www.youtube.com/watch?v=...">
		</div>
		<div class="metafield">
			<label>YouTube Video <?= $v + 1 ?> Title</label>
			<input type="text" name="YSP_YouTube_Title_<?= $v ?>" value="<?= esc_attr( $yt_title ) ?>" placeholder="Optional title">
		</div>
	<?php endfor; ?>

	<h3 style="margin-top:24px;">Virtual Tours</h3>
	<p class="description">Full embeddable tour URL (Matterport, YachtCloser, etc.).</p>
	<?php for ( $t = 0; $t < 2; $t++ ) :
		$tour_url = isset( $virtual_tours[ $t ]->URL ) ? $virtual_tours[ $t ]->URL : '';
	?>
		<div class="metafield">
			<label>Virtual Tour <?= $t + 1 ?> URL</label>
			<input type="url" name="YSP_VirtualTour_<?= $t ?>" value="<?= esc_attr( $tour_url ) ?>" placeholder="https://...">
		</div>
	<?php endfor; ?>

    <div class="metafield">
        <label>Sales Rep Party ID</label>
        <input type="text" name="YSP_Sales_Rep_Party_ID" value="<?= $yacht_ysp_sales_rep_party_id ?>">
    </div>
    <div class="metafield">
        <label>Sales Rep Name</label>
        <input type="text" name="YSP_Sales_Rep_Name" value="<?= $yacht_ysp_sales_rep_name ?>">
    </div>

	<h3 style="margin-top:24px;">Engine 1</h3>
    <div class="metafield">
        <label>Make</label>
        <input type="text" name="YSP_Engine_1_Make" value="<?= $yacht_ysp_engine_1_make ?>">
    </div>
    <div class="metafield">
        <label>Model</label>
        <input type="text" name="YSP_Engine_1_Model" value="<?= $yacht_ysp_engine_1_model ?>">
    </div>
    <div class="metafield">
        <label>Fuel</label>
        <input type="text" name="YSP_Engine_1_Fuel" value="<?= $yacht_ysp_engine_1_fuel ?>">
    </div>
    <div class="metafield">
        <label>Power</label>
        <input type="text" name="YSP_Engine_1_EnginePower" value="<?= $yacht_ysp_engine_1_engine_power ?>">
    </div>
    <div class="metafield">
        <label>Type</label>
        <input type="text" name="YSP_Engine_1_Type" value="<?= $yacht_ysp_engine_1_type ?>">
    </div>
    <div class="metafield">
        <label>Year</label>
        <input type="text" name="YSP_Engine_1_Year" value="<?= $yacht_ysp_engine_1_year ?>">
    </div>
    <div class="metafield">
        <label>Hours</label>
        <input type="text" name="YSP_Engine_1_Hours" value="<?= $yacht_ysp_engine_1_hours ?>">
    </div>
    <div class="metafield">
        <label>Location Code</label>
        <input type="text" name="YSP_Engine_1_Boat_Engine_Location_Code" value="<?= $yacht_ysp_engine_1_boat_engine_location_code ?>">
    </div>

	<h3 style="margin-top:24px;">Engine 2</h3>
    <div class="metafield">
        <label>Make</label>
        <input type="text" name="YSP_Engine_2_Make" value="<?= $yacht_ysp_engine_2_make ?>">
    </div>
    <div class="metafield">
        <label>Model</label>
        <input type="text" name="YSP_Engine_2_Model" value="<?= $yacht_ysp_engine_2_model ?>">
    </div>
    <div class="metafield">
        <label>Fuel</label>
        <input type="text" name="YSP_Engine_2_Fuel" value="<?= $yacht_ysp_engine_2_fuel ?>">
    </div>
    <div class="metafield">
        <label>Power</label>
        <input type="text" name="YSP_Engine_2_EnginePower" value="<?= $yacht_ysp_engine_2_engine_power ?>">
    </div>
    <div class="metafield">
        <label>Type</label>
        <input type="text" name="YSP_Engine_2_Type" value="<?= $yacht_ysp_engine_2_type ?>">
    </div>
    <div class="metafield">
        <label>Year</label>
        <input type="text" name="YSP_Engine_2_Year" value="<?= $yacht_ysp_engine_2_year ?>">
    </div>
    <div class="metafield">
        <label>Hours</label>
        <input type="text" name="YSP_Engine_2_Hours" value="<?= $yacht_ysp_engine_2_hours ?>">
    </div>
    <div class="metafield">
        <label>Location Code</label>
        <input type="text" name="YSP_Engine_2_Boat_Engine_Location_Code" value="<?= $yacht_ysp_engine_2_boat_engine_location_code ?>">
    </div>

    <?php
        $max_manual_images = class_exists( 'YachtSyncPro_Yachts_NestedMetaSections' )
            ? YachtSyncPro_Yachts_NestedMetaSections::MAX_MANUAL_IMAGES
            : 150;

        $image_urls = [];
        if ( is_array( $images ) ) {
            foreach ( $images as $image ) {
                $uri = '';
                if ( is_object( $image ) && ! empty( $image->Uri ) ) {
                    $uri = $image->Uri;
                } elseif ( is_array( $image ) && ! empty( $image['Uri'] ) ) {
                    $uri = $image['Uri'];
                }
                if ( $uri !== '' ) {
                    $image_urls[] = $uri;
                }
            }
        }
        $image_count = count( $image_urls );
    ?>

    <div class="ysp-manual-images" data-max="<?= (int) $max_manual_images ?>">
        <h3>Listing Photos</h3>
        <p class="description">Drag photos to change their order. The first photo is used as the listing image. You can add up to <?= (int) $max_manual_images ?> photos.</p>
        <p class="ysp-manual-images-count"><span class="ysp-manual-images-count-num"><?= (int) $image_count ?></span> / <?= (int) $max_manual_images ?> photos</p>

        <div class="ysp-manual-images-toolbar">
            <button type="button" class="button button-primary ysp-images-add-media">Add from Media Library</button>
            <button type="button" class="button ysp-images-add-url">Add URL</button>
        </div>

        <div id="ysp-manual-images-list" class="ysp-manual-images-list">
            <?php foreach ( $image_urls as $index => $url ) : ?>
                <div class="ysp-image-card">
                    <div class="ysp-image-card-preview">
                        <span class="ysp-image-card-handle dashicons dashicons-move" title="Drag to reorder"></span>
                        <span class="ysp-image-card-index"><?= (int) ( $index + 1 ) ?></span>
                        <img src="<?= esc_url( $url ) ?>" alt="" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="ysp-image-card-placeholder" style="display:none;">No preview</div>
                    </div>
                    <input type="text" name="YSP_Images[]" class="ysp-image-url" value="<?= esc_attr( $url ) ?>" placeholder="https://">
                    <div class="ysp-image-card-actions">
                        <button type="button" class="button ysp-image-replace">Replace</button>
                        <button type="button" class="button-link ysp-image-remove">Remove</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <p class="ysp-manual-images-empty"<?= $image_count ? ' style="display:none;"' : '' ?>>No photos yet. Add images from the media library or paste a URL.</p>
    </div>
</div>

<script type="text/javascript">
jQuery(function($) {
    var $wrap = $('.ysp-manual-images');
    if (!$wrap.length) {
        return;
    }

    var maxImages = parseInt($wrap.data('max'), 10) || 150;
    var $list = $('#ysp-manual-images-list');
    var $empty = $wrap.find('.ysp-manual-images-empty');
    var $count = $wrap.find('.ysp-manual-images-count-num');
    var addFrame;
    var replaceFrame;
    var replaceCard;

    function cardCount() {
        return $list.children('.ysp-image-card').length;
    }

    function remainingSlots() {
        return Math.max(0, maxImages - cardCount());
    }

    function refreshUi() {
        var total = cardCount();
        $count.text(total);
        $empty.toggle(total === 0);
        $wrap.find('.ysp-images-add-media, .ysp-images-add-url').prop('disabled', remainingSlots() === 0);
        $list.children('.ysp-image-card').each(function(i) {
            $(this).find('.ysp-image-card-index').text(i + 1);
            $(this).toggleClass('is-listing-photo', i === 0);
        });
    }

    function bindPreviewError($card) {
        $card.find('img').off('error.yspImages').on('error.yspImages', function() {
            $(this).hide();
            $(this).siblings('.ysp-image-card-placeholder').css('display', 'flex');
        });
    }

    function setPreview($card, url) {
        var $img = $card.find('img');
        var $placeholder = $card.find('.ysp-image-card-placeholder');
        if (url) {
            $img.attr('src', url).show();
            $placeholder.hide();
        } else {
            $img.removeAttr('src').hide();
            $placeholder.css('display', 'flex');
        }
    }

    function makeCard(url) {
        url = url || '';
        var $card = $('<div class="ysp-image-card"></div>');
        $card.append(
            '<div class="ysp-image-card-preview">' +
                '<span class="ysp-image-card-handle dashicons dashicons-move" title="Drag to reorder"></span>' +
                '<span class="ysp-image-card-index"></span>' +
                '<img alt="">' +
                '<div class="ysp-image-card-placeholder">No preview</div>' +
            '</div>' +
            '<input type="text" name="YSP_Images[]" class="ysp-image-url" placeholder="https://">' +
            '<div class="ysp-image-card-actions">' +
                '<button type="button" class="button ysp-image-replace">Replace</button>' +
                '<button type="button" class="button-link ysp-image-remove">Remove</button>' +
            '</div>'
        );
        $card.find('.ysp-image-url').val(url);
        bindPreviewError($card);
        setPreview($card, url);
        return $card;
    }

    if ($.fn.sortable) {
        $list.sortable({
            items: '.ysp-image-card',
            handle: '.ysp-image-card-handle, .ysp-image-card-preview',
            placeholder: 'ysp-image-card-placeholder-sort',
            forcePlaceholderSize: true,
            opacity: 0.85,
            tolerance: 'pointer',
            start: function(e, ui) {
                ui.placeholder.height(ui.item.outerHeight());
                ui.placeholder.width(ui.item.outerWidth());
            },
            update: refreshUi
        });
    }

    $list.children('.ysp-image-card').each(function() {
        bindPreviewError($(this));
    });

    $wrap.on('click', '.ysp-images-add-media', function(e) {
        e.preventDefault();
        if (remainingSlots() === 0) {
            window.alert('You can add up to ' + maxImages + ' photos.');
            return;
        }

        if (addFrame) {
            addFrame.open();
            return;
        }

        addFrame = wp.media({
            title: 'Add listing photos',
            button: { text: 'Add photos' },
            library: { type: 'image' },
            multiple: true
        });

        addFrame.on('select', function() {
            var selection = addFrame.state().get('selection');
            var added = 0;
            selection.each(function(attachment) {
                if (remainingSlots() === 0) {
                    return;
                }
                var data = attachment.toJSON();
                if (data && data.url) {
                    $list.append(makeCard(data.url));
                    added++;
                }
            });
            refreshUi();
            if (selection.length > added) {
                window.alert('Only ' + added + ' photo(s) were added because the limit is ' + maxImages + '.');
            }
        });

        addFrame.open();
    });

    $wrap.on('click', '.ysp-images-add-url', function(e) {
        e.preventDefault();
        if (remainingSlots() === 0) {
            window.alert('You can add up to ' + maxImages + ' photos.');
            return;
        }
        var $card = makeCard('');
        $list.append($card);
        refreshUi();
        $card.find('.ysp-image-url').focus();
    });

    $wrap.on('click', '.ysp-image-replace', function(e) {
        e.preventDefault();
        replaceCard = $(this).closest('.ysp-image-card');

        if (replaceFrame) {
            replaceFrame.open();
            return;
        }

        replaceFrame = wp.media({
            title: 'Replace photo',
            button: { text: 'Use this photo' },
            library: { type: 'image' },
            multiple: false
        });

        replaceFrame.on('select', function() {
            var attachment = replaceFrame.state().get('selection').first().toJSON();
            if (replaceCard && attachment && attachment.url) {
                replaceCard.find('.ysp-image-url').val(attachment.url);
                setPreview(replaceCard, attachment.url);
            }
        });

        replaceFrame.open();
    });

    $wrap.on('click', '.ysp-image-remove', function(e) {
        e.preventDefault();
        $(this).closest('.ysp-image-card').remove();
        refreshUi();
    });

    $wrap.on('input change', '.ysp-image-url', function() {
        var $card = $(this).closest('.ysp-image-card');
        setPreview($card, $.trim($(this).val()));
    });

    refreshUi();
});
</script>

<style type="text/css">
	#yacht-nested-metabox-basics .metafield{
		display: block;
		margin-top: 10px;
		margin-bottom: 10px;
		padding-bottom: 10px;
		border-bottom: 1px solid #000;
	}

	#yacht-nested-metabox-basics .metafield label{
		display: block;
		margin-bottom: 10px;
	}

	#yacht-nested-metabox-basics .metafield input,
	#yacht-nested-metabox-basics .metafield textarea{
		display: block;
		width: 100%;
		max-width: 500px;

	}
	#yacht-nested-metabox-basics .ysp-wysiwyg-field .wp-editor-wrap,
	#yacht-nested-metabox-basics .ysp-wysiwyg-field .wp-editor-container,
	#yacht-nested-metabox-basics .ysp-wysiwyg-field textarea.wp-editor-area {
		max-width: 100%;
		width: 100%;
	}
    #yacht-nested-metabox-basics .metafield input[type="button"]{
        margin-top: 20px;
    }

    .ysp-manual-images {
        margin-top: 24px;
        padding-top: 8px;
        border-top: 1px solid #c3c4c7;
    }
    .ysp-manual-images h3 {
        margin: 16px 0 8px;
    }
    .ysp-manual-images-count {
        font-weight: 600;
        margin: 8px 0 12px;
    }
    .ysp-manual-images-toolbar {
        display: flex;
        gap: 8px;
        margin-bottom: 16px;
    }
    .ysp-manual-images-list {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }
    .ysp-image-card,
    .ysp-image-card-placeholder-sort {
        flex: 1 1 220px;
        max-width: 260px;
    }
    .ysp-image-card {
        background: #fff;
        border: 1px solid #c3c4c7;
        border-radius: 4px;
        padding: 8px;
        box-sizing: border-box;
    }
    .ysp-image-card.is-listing-photo {
        border-color: #2271b1;
        box-shadow: 0 0 0 1px #2271b1;
    }
    .ysp-image-card-preview {
        position: relative;
        height: 150px;
        background: #f0f0f1;
        border-radius: 2px;
        overflow: hidden;
        cursor: move;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .ysp-image-card-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .ysp-image-card-placeholder {
        color: #646970;
        font-size: 12px;
        display: none;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
    }
    .ysp-image-card-handle {
        position: absolute;
        top: 6px;
        left: 6px;
        background: rgba(255,255,255,.9);
        border-radius: 2px;
        z-index: 2;
        cursor: move;
    }
    .ysp-image-card-index {
        position: absolute;
        top: 6px;
        right: 6px;
        background: rgba(0,0,0,.7);
        color: #fff;
        font-size: 11px;
        line-height: 1;
        padding: 4px 6px;
        border-radius: 2px;
        z-index: 2;
    }
    .ysp-image-card.is-listing-photo .ysp-image-card-index:after {
        content: " listing";
        text-transform: lowercase;
        font-weight: 400;
    }
    .ysp-image-card .ysp-image-url {
        width: 100%;
        max-width: none;
        margin-bottom: 8px;
    }
    .ysp-image-card-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 8px;
    }
    .ysp-image-remove {
        color: #b32d2e;
        text-decoration: none;
    }
    .ysp-image-card-placeholder-sort {
        border: 2px dashed #2271b1;
        background: #f0f6fc;
        border-radius: 4px;
        min-height: 230px;
    }
    .ysp-manual-images-empty {
        color: #646970;
        font-style: italic;
    }
</style>