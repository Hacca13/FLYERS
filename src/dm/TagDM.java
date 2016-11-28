package dm;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;

import beans.TagBean;
import jdbc.DriverManagerConnectionPool;

public class TagDM {

	private final static String TABLE_NAME="TAG";
	
	
	public synchronized void insertUser(TagBean newTag) throws SQLException{
		Connection connection = null;
		PreparedStatement preparedStatement = null;
		
		String insertSQL = "INSERT INTO "+TABLE_NAME+" (NOME)"+" VALUE (?)";
		
		try {
			connection = DriverManagerConnectionPool.getConnection();
			preparedStatement = connection.prepareStatement(insertSQL);
			preparedStatement.setString(1, newTag.getNome());
			preparedStatement.executeUpdate();

			connection.commit();
			
		} finally {
			try {
				if (preparedStatement != null)
					preparedStatement.close();
			} finally {
				DriverManagerConnectionPool.releaseConnection(connection);
			}
		}
		
	}
	
	
	
	
}
