<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csv_parser {
	
    function csv_entry_to_array(array $row, $header = false) {
        $column_count = count($row);
        $csv_column_values = array();
        
        // Loop through the columns of the current CSV entry and store its value
        for ($column_index = 0; $column_index < $column_count; $column_index++){
            // Store the value of the current CSV entry
            if($header !== false){
            	if(!is_null($row[$column_index]) && !empty($row[$column_index]))
            		$csv_column_values[$header[$column_index]] = $row[$column_index];
            }else{
	            $csv_column_values[] = $row[$column_index];
            }
        }
        
        // Return
        return $csv_column_values;      
    }

    function csv_file_to_array($input_file_name, $delimeter = ',', $include_header_in_output = TRUE, $length = 1000, $enclosure = '"', $escape = '\\'){
        // NOTE: this attempts to properly recognize line endings when reading files from Mac; has small performance penalty
        ini_set('auto_detect_line_endings', TRUE);

        $csv_array = array();
        $header = array();
        
        // Warnings are supressed, but that's OK since the code handles such warnings
        if (($handle = @fopen($input_file_name, "r")) !== FALSE){
            $row_counter = 0;

            // Iterate over the CSV entries
            while (($row = fgetcsv($handle, $length, $delimeter, $enclosure, $escape)) !== FALSE){           
                if ($row_counter === 0 && $include_header_in_output === TRUE){
                    // This is the first row in the CSV and it should be included in the output
                    $header = $row;
                   
                    $csv_array[] = $this->csv_entry_to_array($row);       
                           
                }else if ($row_counter > 0){
                    // This is a row in the CSV that needs to be stored in the return array
                    $csv_array[] = $this->csv_entry_to_array($row, $header);
                }

                $row_counter++;
            }

            // Close file handler
            fclose($handle);
        }else{
            // Input file: some error occured
            return array();
        }

        return $csv_array;
    }
}
