(function() {
	tinymce.PluginManager.add( 'pb_shortcodes_tinymce', function( editor, url ) {
		editor.addButton( 'pb_shortcodes_tinymce', {
			title: 'PB Shortcodes',
			type: 'menubutton',
			icons: false,
			image: url + '/mce-button.png',
			menu: [
				{
					/* Alert ---------------------------------------*/
					text: 'Alert',
					onclick: function() {
						var $_setValue = tinyMCE.activeEditor.selection.getContent();
						if( '' == $_setValue ) $_setValue = 'Your starter content here.';

						editor.windowManager.open( {
							title: 'PB Shortcodes - Insert Alert',
							body: [
								{
									type: 'listbox',
									name: 'alert_style',
									label: 'Style:',
									values: [
										{ text: 'Note (yellow)', value: 'note' },
										{ text: 'Info (blue)', value: 'info' },
										{ text: 'Error (red)', value: 'error' },
										{ text: 'Success (green)', value: 'success' }
									]
								},
								{
									type: 'textbox',
									name: 'alert_text',
									label: 'Text:',
									multiline: true,
									minWidth: 300,
									minHeight: 100,
									value: $_setValue
								}
							],
							onsubmit: function(e) {
								editor.insertContent('<p>[alert style="'+ e.data.alert_style +'"]'+ e.data.alert_text +'[/alert]</p>');
							}
						});
					}
				},
				{
					/* Buttons ---------------------------------------*/
					text: 'Button',
					onclick: function() {
						editor.windowManager.open( {
							title: 'PB Shortcodes - Insert Button',
							body: [
								{
									type: 'textbox',
									name: 'button_url',
									label: 'Button URL:',
									value: 'http://'
								},
								{
									type: 'textbox',
									name: 'button_text',
									label: 'Button Text:',
									minWidth: 300,
									value: 'Download'
								},
								{
									type: 'listbox',
									name: 'button_color',
									label: 'Button Color:',
									values: [
										{ text: 'Black',  value: 'black' },
										{ text: 'Blue',   value: 'blue' },
										{ text: 'Green',  value: 'green' },
										{ text: 'Grey',   value: 'grey' },
										{ text: 'Orange', value: 'orange' },
										{ text: 'Pink',   value: 'pink' },
										{ text: 'Purple', value: 'purple' },
										{ text: 'Red',    value: 'red' },
										{ text: 'Yellow', value: 'yellow' }
									]
								},
								{
									type: 'listbox',
									name: 'button_size',
									label: 'Button Size:',
									values: [
										{ text: 'Small',  value: 'small' },
										{ text: 'Medium', value: 'medium' },
										{ text: 'Large',  value: 'large' }
									]
								},
								{
									type: 'listbox',
									name: 'button_type',
									label: 'Button Type:',
									values: [
										{ text: 'Round', value: 'round' },
										{ text: 'Square', value: 'square' }
									]
								},
								{
									type: 'listbox',
									name: 'button_target',
									label: 'Button Target:',
									values: [
										{ text: 'Same Window (_self)', value: '_self' },
										{ text: 'New Window (_blank)', value: '_blank' }
									]
								}
							],
							onsubmit: function(e) {
								editor.insertContent('[button url="'+ e.data.button_url +'" color="'+ e.data.button_color +'" size="'+ e.data.button_size +'" type="'+ e.data.button_type +'" target="'+ e.data.button_target +'"]'+ e.data.button_text +'[/button]');
							}
						});
					}
				},
				{
					/* Columns ---------------------------------------*/
					text: 'Columns',
					menu: [
						{
							text: '1/2 + 1/2',
							onclick: function() {
								editor.insertContent('<p>[row]<br>[column size="1/2"]<p>Your starter content here.</p>[/column]<br>[column size="1/2" position="last"]<p>Your starter content here.</p>[/column]<br>[/row]</p>');
							}
						},
						{
							text: '1/3 + 1/3 + 1/3',
							onclick: function() {
								editor.insertContent('<p>[row]<br>[column size="1/3"]<p>Your starter content here.</p>[/column]<br>[column size="1/3"]<p>Your starter content here.</p>[/column]<br>[column size="1/3" position="last"]<p>Your starter content here.</p>[/column]<br>[/row]</p>');
							}
						},
						{
							text: '1/3 + 2/3',
							onclick: function() {
								editor.insertContent('<p>[row]<br>[column size="1/3"]<p>Your starter content here.</p>[/column]<br>[column size="2/3" position="last"]<p>Your starter content here.</p>[/column]<br>[/row]</p>');
							}
						},
						{
							text: '2/3 + 1/3',
							onclick: function() {
								editor.insertContent('<p>[row]<br>[column size="2/3"]<p>Your starter content here.</p>[/column]<br>[column size="1/3" position="last"]<p>Your starter content here.</p>[/column]<br>[/row]</p>');
							}
						},
						{
							text: '1/4 + 1/4 + 1/4 + 1/4',
							onclick: function() {
								editor.insertContent('<p>[row]<br>[column size="1/4"]<p>Your starter content here.</p>[/column]<br>[column size="1/4"]<p>Your starter content here.</p>[/column]<br>[column size="1/4"]<p>Your starter content here.</p>[/column]<br>[column size="1/4" position="last"]<p>Your starter content here.</p>[/column]<br>[/row]</p>');
							}
						},
						{
							text: '1/4 + 1/2 + 1/4',
							onclick: function() {
								editor.insertContent('<p>[row]<br>[column size="1/4"]<p>Your starter content here.</p>[/column]<br>[column size="1/2"]<p>Your starter content here.</p>[/column]<br>[column size="1/4" position="last"]<p>Your starter content here.</p>[/column]<br>[/row]</p>');
							}
						},
						{
							text: '1/2 + 1/4 + 1/4',
							onclick: function() {
								editor.insertContent('<p>[row]<br>[column size="1/2"]<p>Your starter content here.</p>[/column]<br>[column size="1/4"]<p>Your starter content here.</p>[/column]<br>[column size="1/4" position="last"]<p>Your starter content here.</p>[/column]<br>[/row]</p>');
							}
						},
						{
							text: '1/4 + 1/4 + 1/2',
							onclick: function() {
								editor.insertContent('<p>[row]<br>[column size="1/4"]<p>Your starter content here.</p>[/column]<br>[column size="1/4"]<p>Your starter content here.</p>[/column]<br>[column size="1/2" position="last"]<p>Your starter content here.</p>[/column]<br>[/row]</p>');
							}
						},
						{
							text: '1/4 + 3/4',
							onclick: function() {
								editor.insertContent('<p>[row]<br>[column size="1/4"]<p>Your starter content here.</p>[/column]<br>[column size="3/4" position="last"]<p>Your starter content here.</p>[/column]<br>[/row]</p>');
							}
						},
						{
							text: '3/4 + 1/4',
							onclick: function() {
								editor.insertContent('<p>[row]<br>[column size="3/4"]<p>Your starter content here.</p>[/column]<br>[column size="1/4" position="last"]<p>Your starter content here.</p>[/column]<br>[/row]</p>');
							}
						}
					]
				},
				{
					/* Highlight ---------------------------------------*/
					text: 'Highlight',
					onclick: function() {
						var $_setValue = tinyMCE.activeEditor.selection.getContent();
						if( '' == $_setValue ) $_setValue = 'Place your highlighted text here.';
						editor.insertContent('[highlight]'+ $_setValue +'[/highlight]');
					}
				},
				{
					/* Tabs ---------------------------------------*/
					text: 'Tabs',
					onclick: function() {
						editor.insertContent('[tabgroup]<br>[tab title="First Tab"]<p>Your starter content here.</p>[/tab]<br>[tab title="Second Tab"]<p>Your starter content here.</p>[/tab]<br>[/tabgroup]');
					}
				},
				{
					/* Toggle ---------------------------------------*/
					text: 'Toggle',
					onclick: function() {
						var $_setValue = tinyMCE.activeEditor.selection.getContent();
						if( '' == $_setValue ) $_setValue = 'Your starter content here.';
						editor.windowManager.open( {
							title: 'PB Shortcodes - Insert Toggle',
							body: [
								{
									type: 'textbox',
									name: 'toggle_title',
									label: 'Title:',
									value: 'Your Toggle Title'
								},
								{
									type: 'textbox',
									name: 'toggle_content',
									label: 'Content:',
									multiline: true,
									minWidth: 300,
									minHeight: 100,
									value: $_setValue
								},
								{
									type: 'listbox',
									name: 'toggle_state',
									label: 'State:',
									values: [
										{ text: 'Open', value: 'open' },
										{ text: 'Closed', value: 'closed' }
									]
								}
							],
							onsubmit: function(e) {
								editor.insertContent('<p>[toggle title="'+ e.data.toggle_title +'" state="'+ e.data.toggle_state +'"]'+ e.data.toggle_content +'[/toggle]</p>');
							}
						});
					}
				}
			]
		});
	});
})();