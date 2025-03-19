<?php 
namespace App\Modules\Admin\Application\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller; // Make sure to import the base Controller

class DatabaseAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');       // Ensure the user is authenticated
        $this->middleware('role:admin'); // Ensure the user has the admin role
    }

    // Show all tables in the database as JSON
    public function showTables()
    {
        $tables = DB::select('SHOW TABLES'); 
        return response()->json([
            'tables' => $tables,
        ]);
    }

    // Show the structure of a specific table as JSON
    public function showTableStructure($table)
    {
        $structure = DB::select("DESCRIBE {$table}");
        return response()->json([
            'table'     => $table,
            'structure' => $structure,
        ]);
    }

    // Show data for a specific table as JSON (paginated)
    public function showTableData($table)
    {
        $data = DB::table($table)->paginate(10); 
        return response()->json([
            'table' => $table,
            'data'  => $data,
        ]);
    }

    // Execute a custom SQL query and return the result as JSON
    public function executeQuery(Request $request)
    {
        $query = $request->input('query');

        try {
            $result = DB::select($query);
            return response()->json([
                'query'  => $query,
                'result' => $result,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error executing query: ' . $e->getMessage(),
            ], 500);
        }
    }
}
