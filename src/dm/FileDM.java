package dm;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.util.List;

import beans.FileBean;
import beans.TagBean;
import jdbc.DriverManagerConnectionPool;

public class FileDM {

	private final static String TABLE_FILE ="OBJECTFILE (NOME,DESCRIZIONE,RAITING,DATADICARICAMENTO)";
	private final static String TABLE_TAG ="TAG (NOME)";

	public FileDM(){}

	/*CRUD create retrieve update delete*/

	public synchronized void createObjectFile(FileBean bean, List<TagBean> colTags) throws SQLException{
		Connection connection = null;
		PreparedStatement preparedStatement = null;


		String sqlForFile = "INSERT INTO "+TABLE_FILE+" VALUES(?,?,?,?,?)";
		String sqlForTag = "INSERT INTO "+ TABLE_TAG+" VALUES(?)";


		try {
			connection = DriverManagerConnectionPool.getConnection();

			preparedStatement = connection.prepareStatement(sqlForFile);
			preparedStatement.setString(1,bean.getNome());
			preparedStatement.setString(2,bean.getDescrizione());
			preparedStatement.setDouble(3,bean.getRaiting());
			preparedStatement.setDate(4, bean.getDataDiCaricamento());
			preparedStatement.setInt(5,bean.getKeyUtente());
			preparedStatement.executeUpdate();

			connection.commit();

		}finally{
			if(connection != null){
				try {
					connection.close();
				} finally {
					DriverManagerConnectionPool.releaseConnection(connection);
				}
			}
		}

		for(int i=0; i<colTags.size();i++){
			TagBean t = colTags.get(i);

			try{
				connection = DriverManagerConnectionPool.getConnection();
				preparedStatement = connection.prepareStatement(sqlForTag);
				preparedStatement.setString(1,t.getNome());
				preparedStatement.executeUpdate();

			}finally{
				if(connection != null){
					try {
						connection.close();
					} finally {
						DriverManagerConnectionPool.releaseConnection(connection);
					}
				}
			}
		}
	}
	
	
	public synchronized void retrieveFile(String nome)throws SQLException{}
	public synchronized void retrieveFile(TagBean tag)throws SQLException{}
	public synchronized void deleteFile(String nome)throws SQLException{}
	public synchronized void updateFile(FileBean bean)throws SQLException{}
	public synchronized void getListFile(String nome, String orderby)throws SQLException{}
	public synchronized void getListFile(TagBean tag, String orderby)throws SQLException{}

}
