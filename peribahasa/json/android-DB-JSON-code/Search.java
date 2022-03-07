package net.kerul.searchjson;//change this to ur package name

import android.os.Bundle;
import android.app.Activity;
import android.content.Intent;
import android.view.Menu;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.Button;
import android.widget.EditText;

public class Search extends Activity implements OnClickListener {
	private EditText txtkeyword;
	private Button btnsearch;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_search);
		
		//link to UI
		txtkeyword=(EditText)findViewById(R.id.txtkeyword);
		btnsearch=(Button)findViewById(R.id.btnsearch);
		btnsearch.setOnClickListener(this);
	}
	@Override
	public void onClick(View v) {
		if(v.getId()==R.id.btnsearch){
			Intent searchIntent = new Intent(this, ListResult.class);
			//send the keyword to the next screen
			searchIntent.putExtra("keyword",txtkeyword.getText().toString());
			//call the screen for listing
			startActivity(searchIntent);
		}
		
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.search, menu);
		return true;
	}

}
