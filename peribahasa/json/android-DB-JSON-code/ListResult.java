package net.kerul.searchjson;//change to your package name

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
 
import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
 
import android.app.ListActivity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.TextView;
import android.widget.Toast;
 
public class ListResult extends ListActivity {
 
    // Progress Dialog
    private ProgressDialog pDialog;
 
    // Creating JSON Parser object
    JSONParser jParser = new JSONParser();
 
    ArrayList<HashMap<String, String>> idiomsList;
 
    // url to get the idiom list in the Internet
    //private static String url_search = "http://worldconferences.net/idiomjson/search.php";
    //URL to link to Intranet DB (paddockinn 2)
    private static String url_search = "http://192.168.2.54/idiomjson/search.php";
 
    // JSON Node names
    private static final String TAG_SUCCESS = "success";
    private static final String TAG_IDIOMS = "idioms";
    private static final String TAG_ID = "id";
    private static final String TAG_ENTRY = "entry";
    private static final String TAG_MEANING = "meaning";
 
    // products JSONArray
    JSONArray idioms = null;
    //search key value
    public String searchkey;
 
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_result);
        Intent myIntent = getIntent(); 
        // gets the arguments from previously created intent
        searchkey = myIntent.getStringExtra("keyword");
 
        // Hashmap for ListView
        idiomsList = new ArrayList<HashMap<String, String>>();
 
        // Loading idioms in Background Thread
        new LoadIdioms().execute();
 
        // Get listview
        ListView lv = getListView();
 
        // on seleting single idioms
        // to do something 
        lv.setOnItemClickListener(new OnItemClickListener() {
 
            @Override
            public void onItemClick(AdapterView<?> parent, View view,
                    int position, long id) {
                // getting values from selected ListItem
                String iid = ((TextView) view.findViewById(R.id.id)).getText()
                        .toString();
 
            }
        });
 
    }
 
    /**
     * Background Async Task to Load Idioms by making HTTP Request
     * */
    class LoadIdioms extends AsyncTask<String, String, String> {
 
        /**
         * Before starting background thread Show Progress Dialog
         * */
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            pDialog = new ProgressDialog(ListResult.this);
            pDialog.setMessage("Loading IDIOMS. Please wait...");
            pDialog.setIndeterminate(false);
            pDialog.setCancelable(false);
            pDialog.show();
        }
 
        /**
         * getting Idioms from url
         * */
        protected String doInBackground(String... args) {
            // Building Parameters
            List<NameValuePair> params = new ArrayList<NameValuePair>();
            //value captured from previous intent
            params.add(new BasicNameValuePair("keyword", searchkey));
            // getting JSON string from URL
            JSONObject json = jParser.makeHttpRequest(url_search, "GET", params);
 
            // Check your log cat for JSON response
            Log.d("Search idioms: ", json.toString());
 
            try {
                // Checking for SUCCESS TAG
                int success = json.getInt(TAG_SUCCESS);
 
                if (success == 1) {
                    // products found
                    // Getting Array of Products
                    idioms = json.getJSONArray(TAG_IDIOMS);
 
                    // looping through All Products
                    for (int i = 0; i < idioms.length(); i++) {
                        JSONObject c = idioms.getJSONObject(i);
 
                        // Storing each json item in variable
                        String id = c.getString(TAG_ID);
                        String entry = c.getString(TAG_ENTRY);
                        String meaning = c.getString(TAG_MEANING);
 
                        // creating new HashMap
                        HashMap<String, String> map = new HashMap<String, String>();
 
                        // adding each child node to HashMap key => value
                        map.put(TAG_ID, id);
                        map.put(TAG_ENTRY, entry);
                        map.put(TAG_MEANING, meaning);
 
                        // adding HashList to ArrayList
                        idiomsList.add(map);
                    }
                } else {
                    // no idioms found
                	//do something
                }
            } catch (JSONException e) {
                e.printStackTrace();
            }
 
            //return "success";
            return null;
        }
 
        /**
         * After completing background task Dismiss the progress dialog
         * **/
        protected void onPostExecute(String file_url) {
            // dismiss the dialog after getting the related idioms
            pDialog.dismiss();
            // updating UI from Background Thread
            runOnUiThread(new Runnable() {
                public void run() {
                    /**
                     * Updating parsed JSON data into ListView
                     * */
                    ListAdapter adapter = new SimpleAdapter(
                            ListResult.this, idiomsList,
                            R.layout.list_item, new String[] { TAG_ID, TAG_ENTRY, TAG_MEANING},
                            new int[] { R.id.id, R.id.entry, R.id.meaning});
                    // updating listview
                    setListAdapter(adapter);
                }
            });
 
        }
 
    }
}
