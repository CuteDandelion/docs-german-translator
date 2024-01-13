//This is a RUST program, variables are defined immutable by default unless mut is specified. So, it should be side effect free.

use std::env;
use polars::prelude::*;
use std::error::Error;

struct Config {
    query: String,
    file_path: String,
}

fn read_csv(file_path: &str) -> Result<DataFrame> {
    let df = CsvReader::from_path(file_path)?
        .has_header(true)
        .finish()?;
    
    Ok(df)
}


fn parse_config(args: &[String]) -> Config {
    let query = args[1].clone();
    let file_path = args[2].clone();

    Config{query, file_path}
}

// Define a higher-order function that takes a closure as a parameter
fn apply_operation<F>(
    df: DataFrame,
    exclude_columns: &[&str],
    operation: F,
) -> Result<DataFrame>
where
    F: Fn(Series) -> Series,
{
    let mut df_result = DataFrame::default();
    for col in df.get_columns() {
        // Check if the column should be excluded
        if exclude_columns.contains(&col.name()) {
            // If it should be excluded, add the column as is to the result DataFrame
            df_result.with_column(col.clone())?;
        } else {
            // If it should not be excluded, apply the specified operation
            let new_col = operation(col.clone());
            df_result.with_column(new_col)?;
        }
    }
    Ok(df_result)
}

fn main() {
    let args: Vec<String> = env::args().collect();
    let config = parse_config(&args);
   
    let df = read_csv(&config.file_path);

    // Define a closure to double each element in a column
    let double_operation = |col: Series| col * 2;

    let exclude_columns = &["id", "diagnosis"];

    match df{
        //the closure is passed into apply_operation function
        Ok(df) =>  {let new_df = apply_operation(df.clone(), exclude_columns, double_operation);println!("{:?}", new_df);}
        Err(error) => {eprintln!("Error : {:?}", error);}
    }
}
